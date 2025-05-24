@extends('layouts.quiz')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Hasil Rekomendasi Jurusan</h1>

    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-semibold mb-2">{{ $result->recommended_major }}</h2>
        <p class="mb-2"><strong>Universitas:</strong> {{ $result->recommended_university }}</p>
        <p class="mb-2"><strong>Prospek Karir:</strong> {{ $result->career_prospects }}</p>
        <p class="mb-2"><strong>Skor Kecocokan:</strong> {{ $result->score }} / 500</p>
    </div>
</div>
@endsection
