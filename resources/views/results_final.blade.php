@extends('layouts.quiz')

@section('content')
<header style="background-color: white; color: #7b121b; padding: 1rem 2rem; font-weight: 700; font-size: 1.125rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 class="text-xl font-bold bg-gradient-to-r from-[#7f1d1d] to-[#dc2626] inline-flex items-center text-transparent bg-clip-text" style="display: inline-flex; align-items: center;">
        <img src="{{ asset('build/assets/favicon.svg') }}" alt="Logo" style="height: 1.20em; width: auto; margin-right: 0.5rem; vertical-align: middle;" />
        Jurusanku
    </h1>
    <nav>
        <a href="{{ url('/') }}" class="mr-2 text-red-800 hover:text-red-900 animate-hideIn" style="opacity: 1 !important; color: #7b121b !important;">Beranda</a>
        <a href="{{ route('history') }}" class="mr-2 text-red-800 hover:text-red-900 animate-hideIn" style="opacity: 1 !important; color: #7b121b !important;">History</a>
        @auth
            <span style="color: #7b121b;">Halo, {{ auth()->user()->name }}</span> |
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;color:#7b121b;cursor:pointer;padding:0;">Logout</button>
            </form>
            @else
                <a href="{{ route('login') }}" class="mr-2 text-red-800 hover:text-red-900 animate-hideIn" style="opacity: 1 !important; color: #7b121b !important;">Login</a>
            @endauth
    </nav>
</header>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Hasil Rekomendasi Jurusan</h1>

    @foreach ($topClusters->take(2) as $cluster)
    <div
        class="bg-white shadow-lg rounded-lg p-6 mb-8 transform transition duration-500 ease-in-out hover:scale-105"
        style="background: linear-gradient(to right, #7f1d1d, #dc2626);"
    >
        <div class="bg-white rounded-lg p-5 shadow-md">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $cluster->name }}</h2>
<span class="text-red-700 font-bold text-lg">{{ number_format($cluster->matchScore * 20, 2) }}%</span>
            </div>
            <p class="text-gray-700 mb-5">{{ $cluster->description }}</p>

            <div>
                @foreach ($cluster->majors as $major)
                <div class="bg-white rounded-md shadow p-4 mb-5">
                    <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $major->name }}</h3>
                    <p class="text-gray-700 mb-3">{{ $major->description }}</p>

                    <div class="mb-3">
                        <h4 class="font-semibold text-gray-800 mb-1">Universitas Terbaik:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($major->universities as $university)
                            <span class="inline-block bg-gradient-to-r from-[#7f1d1d] to-[#dc2626] text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                {{ $university }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-800 mb-1">Prospek Karier:</h4>
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach ($major->careerProspects as $career)
                            <li>{{ $career }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-12 text-center">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Bagaimana selanjutnya?</h3>
        <div class="flex justify-center gap-6">
            <a href="{{ route('quiz') }}" class="px-6 py-3 bg-gradient-to-r from-[#7f1d1d] to-[#dc2626] text-white font-semibold rounded shadow hover:brightness-110 transition">
                Coba Quiz Lagi
            </a>
            <a href="{{ route('history') }}" class="px-6 py-3 border border-red-700 text-red-700 font-semibold rounded shadow hover:bg-red-700 hover:text-white transition">
                Lihat Riwayat Quiz
            </a>
        </div>
    </div>
</div>
@endsection
