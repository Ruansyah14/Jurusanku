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


<div class="min-h-screen flex flex-col items-center px-4 py-8 max-w-5xl mx-auto bg-white text-[#7b121b]">
    <div class="w-full p-6 rounded-lg shadow-lg bg-white text-[#7b121b]">
        <h1 class="text-3xl font-bold mb-6 text-center font-poppins">Quiz</h1>
        <div id="progress-bar" class="w-full bg-red-300 rounded-full h-5 mb-1 overflow-hidden relative">
            <div id="progress" class="bg-[#7b121b] h-5 rounded-full w-0 transition-all duration-300"></div>
        </div>
        <span id="progress-percent" class="block text-right text-[#7b121b] font-semibold text-sm leading-5 mb-4"></span>
        <form id="quiz-form" action="{{ route('submit') }}" method="POST" class="space-y-6 font-poppins">
            @csrf
            <input type="hidden" name="answers" id="answers-input" />
            <div id="question-container" class="space-y-6 text-[#7b121b] text-lg">
                <!-- Soal akan dirender via JS -->
            </div>
            <div class="flex justify-between">
                <button type="button" id="prev-btn" class="bg-[#7b121b] text-white font-semibold px-6 py-3 rounded-lg hover:bg-red-800 transition" disabled>Sebelumnya</button>
                <button type="button" id="next-btn" class="bg-[#7b121b] text-white font-semibold px-6 py-3 rounded-lg hover:bg-red-800 transition">Berikutnya</button>
                <button type="submit" id="submit-btn" class="bg-[#7b121b] text-white font-semibold px-6 py-3 rounded-lg hover:bg-red-800 transition hidden">Selesai</button>
            </div>
        </form>
    </div>
</div>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
    const questions = [
        { id: 1, question_text: "Kalau ngerjain proyek di sekolah, kamu lebih suka yang mana?", answers: [
            { id: 1, answer_text: "Eksperimen di lab dan analisis data" },
            { id: 2, answer_text: "Bahas dampaknya ke kesehatan dan masyarakat" },
            { id: 3, answer_text: "Bikin solusi pake teknologi baru" },
            { id: 4, answer_text: "Teliti aspek sosial dan budayanya" }
        ]},
        { id: 2, question_text: "Kalau ada masalah ribet, biasanya kamu gimana?", answers: [
            { id: 5, answer_text: "Cari pola dan analisis data step by step" },
            { id: 6, answer_text: "Pikirin dampaknya ke orang lain dulu" },
            { id: 7, answer_text: "Cari solusi kreatif yang belum pernah ada" },
            { id: 8, answer_text: "Organize tim dan bagi tugas" }
        ]},
        { id: 3, question_text: "Di ekskul, kamu paling suka kegiatan yang mana?", answers: [
            { id: 9, answer_text: "Ikut klub robotik dan coding" },
            { id: 10, answer_text: "Ikut kegiatan sosial dan kesehatan" },
            { id: 11, answer_text: "Jadi ketua organisasi/kepanitiaan" },
            { id: 12, answer_text: "Ikut klub seni dan desain" }
        ]},
        { id: 4, question_text: "Kalau scroll feed, konten apa yang bikin kamu auto save?", answers: [
            { id: 13, answer_text: "Tech update dan inovasi terbaru" },
            { id: 14, answer_text: "Isu sosial dan kemanusiaan" },
            { id: 15, answer_text: "Business & entrepreneurship" },
            { id: 16, answer_text: "Seni, kultur, dan entertainment" }
        ]},
        { id: 5, question_text: "Di tugas kelompok, kamu biasanya ambil peran apa?", answers: [
            { id: 17, answer_text: "Analisis data dan bikin kesimpulan" },
            { id: 18, answer_text: "Jadi leader dan koordinator tim" },
            { id: 19, answer_text: "Kasih ide-ide fresh dan kreatif" },
            { id: 20, answer_text: "Handle presentasi dan komunikasi" }
        ]},
        { id: 6, question_text: "Soal isu lingkungan, kamu paling fokus ke mana?", answers: [
            { id: 21, answer_text: "Riset dampak ke ekosistem" },
            { id: 22, answer_text: "Bikin solusi teknologi ramah lingkungan" },
            { id: 23, answer_text: "Kampanye dan edukasi ke masyarakat" },
            { id: 24, answer_text: "Design konten untuk campaign" }
        ]},
        { id: 7, question_text: "Di praktikum, yang paling bikin kamu excited apa?", answers: [
            { id: 25, answer_text: "Eksperimen dan analisis hasilnya" },
            { id: 26, answer_text: "Praktekin teori yang udah dipelajari" },
            { id: 27, answer_text: "Kerja bareng temen-temen" },
            { id: 28, answer_text: "Bikin laporan yang keren dan visual" }
        ]},
        { id: 8, question_text: "Kalau bikin konten digital, kamu fokus ke mana?", answers: [
            { id: 29, answer_text: "Coding dan logika programnya" },
            { id: 30, answer_text: "Design UI yang aesthetic" },
            { id: 31, answer_text: "Manage tim dan timeline" },
            { id: 32, answer_text: "Bikin konten yang engaging" }
        ]},
        { id: 9, question_text: "Di diskusi kelompok, kamu gimana?", answers: [
            { id: 33, answer_text: "Analisis fakta dan data objektif" },
            { id: 34, answer_text: "Pertimbangin aspek sosial dan etika" },
            { id: 35, answer_text: "Kasih solusi out of the box" },
            { id: 36, answer_text: "Pastiin semua dapet kesempatan ngomong" }
        ]},
        { id: 10, question_text: "Kalau riset sosial, kamu lebih suka ngapain?", answers: [
            { id: 37, answer_text: "Olah data statistik" },
            { id: 38, answer_text: "Interview dan observasi langsung" },
            { id: 39, answer_text: "Bikin rekomendasi solusi" },
            { id: 40, answer_text: "Design infografis yang informatif" }
        ]},
        { id: 11, question_text: "Di kegiatan lingkungan, yang paling menarik buat kamu apa?", answers: [
            { id: 41, answer_text: "Riset ekosistem dan biodiversitas" },
            { id: 42, answer_text: "Develop teknologi pelestarian" },
            { id: 43, answer_text: "Organize program komunitas" },
            { id: 44, answer_text: "Dokumentasi flora dan fauna" }
        ]},
        { id: 12, question_text: "Di workshop, topik apa yang bikin kamu tertarik?", answers: [
            { id: 45, answer_text: "Tech & digital innovation" },
            { id: 46, answer_text: "Self-development & leadership" },
            { id: 47, answer_text: "Start-up & entrepreneurship" },
            { id: 48, answer_text: "Creative & digital art" }
        ]},
        { id: 13, question_text: "Soal isu global, kamu paling concern sama apa?", answers: [
            { id: 49, answer_text: "Inovasi teknologi masa depan" },
            { id: 50, answer_text: "Dampak ke kehidupan manusia" },
            { id: 51, answer_text: "Ekonomi dan kebijakan" },
            { id: 52, answer_text: "Kelestarian lingkungan" }
        ]},
        { id: 14, question_text: "Bikin konten digital, yang penting buat kamu apa?", answers: [
            { id: 53, answer_text: "Performance & technical quality" },
            { id: 54, answer_text: "Visual yang aesthetic" },
            { id: 55, answer_text: "Engagement & interaksi user" },
            { id: 56, answer_text: "Analytics & data insight" }
        ]},
        { id: 15, question_text: "Di kegiatan sosial, kamu lebih suka ngapain?", answers: [
            { id: 57, answer_text: "Analisis impact & kebutuhan" },
            { id: 58, answer_text: "Turun langsung bantu di lapangan" },
            { id: 59, answer_text: "Koordinir volunteer" },
            { id: 60, answer_text: "Dokumentasi kegiatan" }
        ]},
        { id: 16, question_text: "Bikin project inovasi, yang paling penting apa?", answers: [
            { id: 61, answer_text: "Tech development yang cutting-edge" },
            { id: 62, answer_text: "Impact sosial & accessibility" },
            { id: 63, answer_text: "Potensi bisnis & scalability" },
            { id: 64, answer_text: "User experience yang smooth" }
        ]},
        { id: 17, question_text: "Soal climate change, menurutmu yang paling efektif apa?", answers: [
            { id: 65, answer_text: "Riset & inovasi teknologi" },
            { id: 66, answer_text: "Campaign & social movement" },
            { id: 67, answer_text: "Policy & regulation" },
            { id: 68, answer_text: "Konservasi alam" }
        ]},
        { id: 18, question_text: "Di kompetisi, kekuatan kamu apa?", answers: [
            { id: 69, answer_text: "Problem solving yang on point" },
            { id: 70, answer_text: "Ide-ide fresh yang innovative" },
            { id: 71, answer_text: "Leadership & team work" },
            { id: 72, answer_text: "Public speaking & presentation" }
        ]},
        { id: 19, question_text: "Kalau ada proyek tentang pembangunan berkelanjutan, kamu lebih tertarik yang mana?", answers: [
            { id: 73, answer_text: "Bikin teknologi ramah lingkungan" },
            { id: 74, answer_text: "Program pemberdayaan masyarakat" },
            { id: 75, answer_text: "Analisis dampak ekonominya" },
            { id: 76, answer_text: "Desain tata kota yang nyaman" }
        ]},
        { id: 20, question_text: "Kalau kota kamu punya masalah, mana yang paling kamu prioritasin?", answers: [
            { id: 77, answer_text: "Bikin sistem kota pintar biar efisien" },
            { id: 78, answer_text: "Pastiin semua warga bisa akses fasilitas" },
            { id: 79, answer_text: "Jagain lingkungan kota tetap asri" },
            { id: 80, answer_text: "Bikin desain kota yang nyaman dan bagus" }
        ]}
    ];

    if (!questions.length) {
        alert("Tidak ada data soal.");
    }

    let currentQuestionIndex = 0;
    const answers = {};

    const questionContainer = document.getElementById('question-container');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');
    const progress = document.getElementById('progress');
    const progressPercent = document.getElementById('progress-percent');
    const answersInput = document.getElementById('answers-input');

    function renderQuestion(index) {
        const question = questions[index];
        if (!question) return;

        questionContainer.innerHTML = '';

        const questionTitle = document.createElement('p');
        questionTitle.className = 'font-semibold text-xl mb-4';
        questionTitle.textContent = `Soal ${index + 1} dari ${questions.length}: ${question.question_text}`;
        questionContainer.appendChild(questionTitle);

        const optionsDiv = document.createElement('div');
        optionsDiv.className = 'space-y-4';

        question.answers.forEach((answer) => {
            const optionLabel = document.createElement('label');
            optionLabel.className = 'flex items-center space-x-3 cursor-pointer text-[#7b121b] bg-white rounded-md px-4 py-3 hover:bg-red-100 transition';

            const optionRadio = document.createElement('input');
            optionRadio.type = 'radio';
            optionRadio.name = 'option';
            optionRadio.className = 'form-radio text-[#7b121b]';
            optionRadio.value = answer.id;
            optionRadio.checked = answers[question.id] === answer.id;
            optionRadio.addEventListener('change', () => {
                selectOption(index, answer.id);
            });

            const optionSpan = document.createElement('span');
            optionSpan.textContent = answer.answer_text;

            optionLabel.appendChild(optionRadio);
            optionLabel.appendChild(optionSpan);
            optionsDiv.appendChild(optionLabel);
        });

        questionContainer.appendChild(optionsDiv);

        prevBtn.disabled = index === 0;
        nextBtn.classList.toggle('hidden', index === questions.length - 1);
        submitBtn.classList.toggle('hidden', index !== questions.length - 1);

        updateProgressBar();
    }

    function selectOption(questionIndex, answerId) {
        const question = questions[questionIndex];
        answers[question.id] = answerId;
        updateAnswersInput();
    }

    function updateAnswersInput() {
        answersInput.value = JSON.stringify(answers);
    }

    function updateProgressBar() {
        const percent = ((currentQuestionIndex + 1) / questions.length) * 100;
        progress.style.width = percent + '%';
        progressPercent.textContent = Math.round(percent) + '%';
    }

    prevBtn.addEventListener('click', () => {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            renderQuestion(currentQuestionIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        const currentQ = questions[currentQuestionIndex];
        if (!answers[currentQ.id]) {
            alert('Silakan pilih jawaban terlebih dahulu.');
            return;
        }
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            renderQuestion(currentQuestionIndex);
        }
    });

    // Initialize
    renderQuestion(currentQuestionIndex);
</script>
@endsection
</content>
</edit_file>
