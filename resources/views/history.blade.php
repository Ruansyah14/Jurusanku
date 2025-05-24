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

    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-6 text-center">Riwayat Kuis</h1>

    <!-- Search Bar -->
    <div class="mb-4 max-w-md mx-auto">
        <input
            type="text"
            id="search"
            name="search"
            placeholder="Cari nama kuis atau jurusan..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent transition"
            onkeyup="filterTable()"
            autocomplete="off"
        />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        @if($histories->count() > 0)
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-red-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Jurusan Rekomendasi</th>
                    <th class="px-4 py-3 text-left">Tanggal Dikerjakan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="historyTable">
                @foreach($histories as $index => $history)
                <tr class="@if($index % 2 == 0) bg-gray-50 @else bg-white @endif hover:bg-red-100 transition">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $history->recommended_major }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($history->created_at)->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('history.show', $history->id) }}"
                           class="inline-block bg-gradient-to-r from-red-800 to-red-600 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-md hover:from-red-700 hover:to-red-500 transition transform hover:-translate-y-0.5">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center text-gray-600 mt-8">Belum ada riwayat kuis.</p>
        @endif
    </div>
</div>

<!-- Simple client-side search filter -->
<script>
    function filterTable() {
        const input = document.getElementById('search');
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll('#historyTable tr');

        rows.forEach(row => {
            const quizName = row.cells[1].textContent.toLowerCase();
            const major = row.cells[2].textContent.toLowerCase();
            if (quizName.includes(filter) || major.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endsection
