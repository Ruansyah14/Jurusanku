@extends('layouts.quiz')

@section('content')
<div class="container mx-auto px-4 py-8 font-poppins text-[#7b121b]">
    <nav class="text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:text-red-700">Beranda</a></li>
            <li><span class="mx-2">></span></li>
            <li><a href="{{ route('history') }}" class="hover:text-red-700">Riwayat</a></li>
            <li><span class="mx-2">></span></li>
            <li class="text-red-700 font-semibold">Detail</li>
        </ol>
    </nav>

    <h1 class="text-3xl font-bold mb-6 text-center">Detail Riwayat Kuis</h1>

    <div class="bg-white border border-gray-300 rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <p><strong>Nama Kuis:</strong> {{ $history->quiz_name }}</p>
        <p><strong>Jurusan Rekomendasi:</strong> {{ $history->result_major }}</p>
        <p><strong>Tanggal Dikerjakan:</strong> {{ \Carbon\Carbon::parse($history->created_at)->format('d M Y, H:i') }}</p>
        <p><strong>Skor:</strong> {{ $history->score }}%</p>
        @if($history->recommended_university)
        <p><strong>Universitas Rekomendasi:</strong> {{ $history->recommended_university }}</p>
        @endif
        @if($history->career_prospects)
        <p><strong>Prospek Karir:</strong> {{ $history->career_prospects }}</p>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route('history') }}" class="inline-block bg-gradient-to-r from-red-800 to-red-600 text-white px-6 py-2 rounded-full font-semibold shadow-md hover:from-red-700 hover:to-red-500 transition transform hover:-translate-y-0.5">
                Kembali ke Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
