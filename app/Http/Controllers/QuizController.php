<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use App\Data\AnswerTraits;
use App\Data\MajorClusters;
use App\Helpers\QuizHelper;

class QuizController extends Controller
{
    public function quiz()
    {
        return view('quiz');
    }

    public function submit(Request $request)
    {
        $user = Auth::user();

        $answersJson = $request->input('answers'); // JSON string
        $answers = json_decode($answersJson, true); // decode to array

        if (!$answers || count($answers) == 0) {
            return redirect()->route('quiz')->withErrors('Anda harus menjawab semua pertanyaan.');
        }

        // Ambil trait user dari jawaban dan hitung frekuensi kemunculan trait
        $traitFrequency = [];
        foreach ($answers as $answer_id) {
            if (isset(AnswerTraits::$mapping[$answer_id])) {
                foreach (AnswerTraits::$mapping[$answer_id] as $trait) {
                    if (!isset($traitFrequency[$trait])) {
                        $traitFrequency[$trait] = 0;
                    }
                    $traitFrequency[$trait]++;
                }
            } else {
                \Log::warning("Answer ID $answer_id tidak ditemukan di AnswerTraits mapping.");
            }
        }

        // Buat array userTraits unik dari traitFrequency keys
        $userTraits = array_keys($traitFrequency);

        // Hitung skor kecocokan tiap major cluster menggunakan QuizHelper
        $clusterScores = [];
        foreach (MajorClusters::$majorClusters as $key => $cluster) {
$score = QuizHelper::calculateWeightedMatchScore($userTraits, $cluster['traits'], MajorClusters::$traitWeights);
            $clusterScores[$key] = $score;
        }

        // Cari cluster dengan skor tertinggi dan kedua jika skor mendekati
        arsort($clusterScores);
        $topClusterKey = key($clusterScores);
        $topClusterScore = current($clusterScores);
        $clusterKeys = array_keys($clusterScores);
        $secondClusterKey = $clusterKeys[1] ?? null;
        $secondClusterScore = $secondClusterKey ? $clusterScores[$secondClusterKey] : 0;

        $topCluster = MajorClusters::$majorClusters[$topClusterKey];
        $secondCluster = $secondClusterKey ? MajorClusters::$majorClusters[$secondClusterKey] : null;

        // Threshold skor minimum untuk rekomendasi
        $threshold = 1.0;

        // Pilih rekomendasi cluster berdasarkan threshold
        $recommendedClusters = [];
        if ($topClusterScore >= $threshold) {
            $recommendedClusters[] = $topCluster;
        }
        if ($secondCluster && $secondClusterScore >= $threshold * 0.8) {
            $recommendedClusters[] = $secondCluster;
        }

        // Gabungkan rekomendasi jurusan, universitas, dan prospek karir dari cluster yang direkomendasikan

        $recommendedMajors = [];

        $recommendedUniversities = [];

        $careerProspects = [];

        foreach ($recommendedClusters as $cluster) {

            foreach ($cluster['majors'] as $major) {

                $recommendedMajors[] = $major['name'];

                if (is_array($major['universities'])) {
                    $recommendedUniversities = array_merge($recommendedUniversities, $major['universities']);
                } else {
                    $recommendedUniversities[] = $major['universities'];
                }

                if (is_array($major['careerProspects'])) {
                    foreach ($major['careerProspects'] as $prospect) {
                        if (is_array($prospect)) {
                            $careerProspects = array_merge($careerProspects, $prospect);
                        } else {
                            $careerProspects[] = $prospect;
                        }
                    }
                } else {
                    $careerProspects[] = $major['careerProspects'];
                }

            }

        }

        // Hilangkan duplikat

        $recommendedMajors = array_unique($recommendedMajors);

        $recommendedUniversities = array_unique($recommendedUniversities);

        $careerProspects = array_unique($careerProspects);



        // Pastikan ada minimal 3 jurusan utama
        if (count($recommendedMajors) < 3) {
            // Jika kurang dari 3, tambahkan jurusan dari cluster utama sampai 3
            // Sebaiknya tambahkan jurusan dari cluster utama, bukan placeholder
            $needed = 3 - count($recommendedMajors);
            $additionalMajors = [];
            foreach ($topCluster['majors'] as $major) {
                if (!in_array($major['name'], $recommendedMajors)) {
                    $additionalMajors[] = $major['name'];
                    if (count($additionalMajors) >= $needed) {
                        break;
                    }
                }
            }
            $recommendedMajors = array_merge($recommendedMajors, $additionalMajors);
        }

        // Pisahkan jurusan utama (3) dan opsi lainnya
        $mainRecommendedMajors = array_slice($recommendedMajors, 0, 3);
        $otherRecommendedMajors = array_slice($recommendedMajors, 3);

        // Batasi skor kecocokan antara 1 sampai 100 persen
        $scorePercentage = round($topClusterScore * 20);
        if ($scorePercentage < 1) {
            $scorePercentage = 1;
        } elseif ($scorePercentage > 100) {
            $scorePercentage = 100;
        }

        // Simpan hasil
        $result = Result::create([
            'user_id' => $user->id,
            'score' => $scorePercentage, // persentase dibatasi 1-100
            'recommended_major' => implode(', ', $recommendedMajors),
            'recommended_university' => implode(', ', $recommendedUniversities),
            'career_prospects' => implode(', ', $careerProspects),
        ]);

        // Kirim data tambahan ke view melalui session atau redirect dengan flash data
  return redirect()->route('results', ['result_id' => $result->id])
    ->with([
        'topClusters' => collect($recommendedClusters)->map(function ($cluster, $key) use ($clusterScores) {
            return (object)[
                'name' => $cluster['name'],
                'description' => $cluster['description'],
                'matchScore' => $clusterScores[$key] ?? 0,
                'majors' => collect($cluster['majors'])->map(function ($major) {
                    return (object)[
                        'name' => $major['name'],
                        'description' => $major['description'],
                        'universities' => $major['universities'],
                        'careerProspects' => $major['careerProspects'],
                    ];
                })
            ];
        }),
        'mainRecommendedMajors' => $mainRecommendedMajors,
        'otherRecommendedMajors' => $otherRecommendedMajors,
        'scorePercentage' => $scorePercentage,
    ]);

    }

   public function results($resultId)
{
    $result = Result::findOrFail($resultId);

    $topClusters = session('topClusters', collect());
    $mainRecommendedMajors = session('mainRecommendedMajors', []);
    $otherRecommendedMajors = session('otherRecommendedMajors', []);
    $scorePercentage = session('scorePercentage', $result->score);

    return view('results_final', [
        'result' => $result,
        'topClusters' => $topClusters,
        'mainRecommendedMajors' => $mainRecommendedMajors,
        'otherRecommendedMajors' => $otherRecommendedMajors,
        'scorePercentage' => $scorePercentage,
    ]);
}


    public function history()
    {
        $user = auth()->user();
        $histories = Result::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('history', compact('histories'));
    }

    public function show($id)
    {
        $user = auth()->user();
        $history = Result::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        return view('history_show', compact('history'));
    }
}
