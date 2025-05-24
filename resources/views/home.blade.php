<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tes Minat dan Bakat - Beranda</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f5f7fa;
            color: #333;
        }
        header {
            background-color: #2a3f54;
            padding: 1rem 2rem;
            color: white;
            text-align: center;
        }
        main {
            max-width: 1000px;
            margin: 2rem auto;
            background: white;
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            margin-top: 0;
            color: #2a3f54;
            font-weight: 700;
            font-size: 2.5rem;
        }
        p {
            font-size: 1.15rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        .btn-start {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.85rem 2rem;
            background-color: #ff6f61;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(255,111,97,0.4);
        }
        .btn-start:hover {
            background-color: #e65b4f;
            box-shadow: 0 6px 12px rgba(230,91,79,0.6);
        }
        footer {
            text-align: center;
            padding: 1rem;
            color: #777;
            font-size: 0.9rem;
            margin-top: 3rem;
        }
        /* Additional layout similar to reference */
        .intro-section {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        .intro-text {
            flex: 1;
        }
        .intro-image {
            flex: 1;
        }
        .intro-image img {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Tes Minat dan Bakat Siswa Kelas 3 SMA/SMK</h1>
    </header>
    <main>
        <section class="intro-section">
            <div class="intro-text">
                <p>Kenali minat dan bakat Anda dengan tes yang mudah dan cepat. Jangan sampai salah jurusan, pilihlah program studi yang sesuai dengan potensi Anda.</p>
                <a href="{{ route('quiz.show') }}" class="btn-start">Mulai Tes Minat dan Bakat</a>
            </div>
            <div class="intro-image">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80" alt="Ilustrasi siswa belajar" />
            </div>
        </section>
        <section>
            <h2>Mengapa Tes Ini Penting?</h2>
            <p>Tes ini membantu Anda memahami kecenderungan minat dan bakat sehingga dapat memilih jurusan yang tepat dan meningkatkan peluang sukses di masa depan.</p>
        </section>
    </main>
    <footer>
        &copy; 2024 Tes Minat dan Bakat
    </footer>
</body>
</html>
