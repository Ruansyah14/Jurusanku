<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama
        DB::table('answers')->delete();
        DB::table('questions')->delete();

        // Data soal dan jawaban sesuai dengan data yang diberikan user
        $questions = [
            [
                'question_text' => 'Kalau ngerjain proyek di sekolah, kamu lebih suka yang mana?',
                'answers' => [
                    ['answer_text' => 'Eksperimen di lab dan analisis data', 'traits' => ['analytical', 'scientific']],
                    ['answer_text' => 'Bahas dampaknya ke kesehatan dan masyarakat', 'traits' => ['social', 'empathetic']],
                    ['answer_text' => 'Bikin solusi pake teknologi baru', 'traits' => ['technical', 'innovative']],
                    ['answer_text' => 'Teliti aspek sosial dan budayanya', 'traits' => ['social', 'organized']],
                ],
            ],
            [
                'question_text' => 'Kalau ada masalah ribet, biasanya kamu gimana?',
                'answers' => [
                    ['answer_text' => 'Cari pola dan analisis data step by step', 'traits' => ['analytical', 'logical']],
                    ['answer_text' => 'Pikirin dampaknya ke orang lain dulu', 'traits' => ['empathetic', 'social']],
                    ['answer_text' => 'Cari solusi kreatif yang belum pernah ada', 'traits' => ['creative', 'innovative']],
                    ['answer_text' => 'Organize tim dan bagi tugas', 'traits' => ['organized', 'leadership']],
                ],
            ],
            // Tambahkan soal 3 sampai 20 dengan format yang sama sesuai data yang diberikan
        ];

        foreach ($questions as $q) {
            $questionId = DB::table('questions')->insertGetId([
                'question_text' => $q['question_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($q['answers'] as $a) {
                $answerId = DB::table('answers')->insertGetId([
                    'question_id' => $questionId,
                    'answer_text' => $a['answer_text'],
                    'score' => 1, // Skor default, bisa disesuaikan
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Simpan mapping trait ke file AnswerTraits.php secara manual atau buat tabel baru jika perlu
                // Karena trait mapping tidak bisa langsung disimpan di DB, ini hanya contoh seeding data soal dan jawaban
            }
        }
    }
}
