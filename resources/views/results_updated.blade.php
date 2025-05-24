@extends('layouts.quiz')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Hasil Rekomendasi Jurusan</h1>

    <div class="bg-white shadow rounded p-6 mb-6">
        <h2 class="text-xl font-semibold mb-2">Rekomendasi Utama</h2>
        <ul class="list-disc list-inside mb-4">
            @foreach ($mainRecommendedMajors as $major)
                <li>{{ $major }}</li>
            @endforeach
        </ul>
    </div>

    @if (count($otherRecommendedMajors) > 0)
    <div class="bg-white shadow rounded p-6 mb-6">
        <h2 class="text-xl font-semibold mb-2">Opsi Rekomendasi Lainnya</h2>
        <ul class="list-disc list-inside">
            @foreach ($otherRecommendedMajors as $major)
                <li>{{ $major }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white shadow rounded p-6">
        <p class="mb-2"><strong>Universitas:</strong> {{ $result->recommended_university }}</p>
        <p class="mb-2"><strong>Prospek Karir:</strong> {{ $result->career_prospects }}</p>
        <p class="mb-2"><strong>Skor Kecocokan:</strong> {{ $scorePercentage }}%</p>
    </div>
</div>
@endsection
