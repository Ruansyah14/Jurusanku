<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="icon" type="image/svg+xml" href="build/assets/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jurusanku</title>
    <style>
        /* Reset dan dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #7b121b;
            line-height: 1.6;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        /* Header */
        header {
            background-color: #7b121b;
            padding: 1rem 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            font-weight: 700;
            font-size: 1.5rem;
        }
        nav a {
            margin-left: 1.5rem;
            font-weight: 600;
            color: white;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #7b121b;
        }
        /* Hero Section */
        .hero {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 3rem 2rem;
            background-color: #ffffff;
            max-width: 1200px;
            margin: 2rem auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            min-height: 350px;
            color: #7b121b;
            opacity: 0;
            animation: hideIn 1s forwards;
        }
        @keyframes hideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hero-text {
            flex: 1 1 45%;
            padding: 1rem 2rem;
        }
        .hero-text h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #7b121b;
        }
        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #495057;
        }
        .btn-primary {
            background-color: #7b121b;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: #4b0a12;
        }
        .hero-image {
            flex: 1 1 45%;
            padding: 1rem 2rem;
            text-align: center;
        }
        .hero-image img {
            max-width: 100%;
            height: 350px;
            object-fit: contain;
            border-radius: 12px;
        }
        /* University Cards Section */
        .ptn-cards {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        .ptn-cards h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #7b121b;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            justify-items: center;
        }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 1rem 1.5rem;
            width: 100%;
            max-width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 0.75rem;
        }
        .card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #7b121b;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .card p {
            color: #495057;
            font-size: 1rem;
            text-align: center;
        }
        /* Footer */
        footer {
            text-align: center;
            padding: 2rem 2rem;
            color: white;
            font-size: 1rem;
            margin-top: 3rem;
            background: linear-gradient(90deg, #000000, #000000,);
            box-shadow: 0 -2px 8px rgba(0,0,0,0.15);
            font-family: 'Georgia', serif;
            width: 1000%;
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
            }
            .hero-text, .hero-image {
                flex: 1 1 100%;
                padding: 1rem 0;
            }
            .cards-grid {
                grid-template-columns: 1fr;
            }
            footer {
                max-width: 100%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <header style="background-color: white; color: #7b121b; padding: 1rem 2rem;">
        <h1 class="text-xl font-bold bg-gradient-to-r from-[#7f1d1d] to-[#dc2626] inline-flex items-center text-transparent bg-clip-text" style="display: inline-flex; align-items: center;">
            <img src="{{ asset('build/assets/favicon.svg') }}" alt="Logo" style="height: 1.20em; width: auto; margin-right: 0.5rem; vertical-align: middle;" />
            Jurusanku
</h1>

<nav style="font-weight: 700; font-size: 1.125rem; margin-left: 1.5rem; color: #7b121b; transition: color 0.3s ease; opacity: 1 !important;">
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
    </header>
    <section class="hero">
        <div class="hero-text">
            <h2>Kenali Minat dan Bakatmu</h2>
            <p>Jangan salah jurusan! Ikuti tes minat dan bakat kami untuk menemukan program</p>
              <section style="text-align: center; margin: 2rem;">
        <a href="{{ route('quiz') }}" class="btn-primary" style="float: left; margin-left: -33px;">Mulai Tes Minat dan Bakat</a>

    </section>
        </div>
        <div class="hero-image">
            <img src="{{ asset('build/assets/graduation-concept-illustration.png') }}" alt="Ilustrasi Minat dan Bakat" style="max-width: 120%; height: auto;" />
        </div>
    </section>
    <section class="ptn-cards">
        <h2>Top 12 Universitas di Indonesia</h2>
        <div class="cards-grid">
            <div class="card">
                <img src="{{ asset('build/assets/ui logo.png') }}" alt="Universitas Indonesia (UI)" />
                <h3>Universitas Indonesia (UI)</h3>
                <p>Universitas tertua dan terbesar di Indonesia dengan berbagai program studi unggulan.</p>
            </div>
               <div class="card">
                <img src="{{ asset('build/assets/unpad logo.png') }}" alt="Universitas Brawijaya (UB)" />
                <h3>Universitas Padjadjaran (UNPAD)</h3>
                <p>Universitas di Bandung dengan program studi unggulan di bidang hukum, komunikasi, dan kesehatan.</p>
            </div>

            <div class="card">
                <img src="{{ asset('build/assets/ugm logo.jpg') }}" alt="Universitas Gadjah Mada (UGM)" />
                <h3>Universitas Gadjah Mada (UGM)</h3>
                <p>Universitas negeri di Yogyakarta yang terkenal dengan program studi sosial dan humaniora.</p>
            </div>
            <div class="card">
                <img src="{{ asset('build/assets/ipb logo.png') }}" alt="Institut Pertanian Bogor (IPB)" />
                <h3>Institut Pertanian Bogor (IPB)</h3>
                <p>Kampus unggulan di bidang pertanian dan ilmu lingkungan.</p>
            </div>
            <div class="card">
                <img src="{{ asset('build/assets/unair logo.png') }}" alt="Universitas Airlangga (UNAIR)" />
                <h3>Universitas Airlangga (UNAIR)</h3>
                <p>Universitas di Surabaya yang fokus pada kesehatan dan ilmu sosial.</p>
            </div>
             <div class="card">
                <img src="{{ asset('build/assets/itb logo.png') }}" alt="Institut Teknologi Bandung (ITB)" />
                <h3>Institut Teknologi Bandung (ITB)</h3>
                <p>Kampus teknik terkemuka dengan reputasi internasional di bidang sains dan teknologi.</p>
            </div>
            <div class="card">
                <img src="{{ asset('build/assets/uns logo.png') }}" alt="Universitas Sebelas Maret (UNS)" />
                <h3>Universitas Sebelas Maret (UNS)</h3>
                <p>Universitas di Solo yang berkembang pesat dengan berbagai program studi.</p>
            </div>
            <div class="card">
                <img src="{{ asset('build/assets/ub logo.jpg') }}" alt="Universitas Brawijaya (UB)" />
                <h3>Universitas Brawijaya (UB)</h3>
                <p>Universitas di Malang yang dikenal dengan program studi pertanian dan teknik.</p>
            </div>
              <div class="card">
                <img src="{{ asset('build/assets/its logo.png') }}" alt="Universitas Brawijaya (UB)" />
                <h3>Institut Teknologi Sepuluh Nopember (ITS)</h3>
                <p>Universitas di Malang yang dikenal dengan program studi pertanian dan teknik.</p>
            </div>

            <div class="card">
                <img src="{{ asset('build/assets/unhas logo.png') }}" alt="Universitas Brawijaya (UB)" />
                <h3>Universitas Hasanuddin (UNHAS)</h3>
                <p>Universitas di Makassar dengan program studi unggulan di bidang kelautan, pertanian, dan kesehatan.</p>
            </div>
            <div class="card">
                <img src="{{ asset('build/assets/unand logo.png') }}" alt="Universitas Brawijaya (UB)" />
                <h3>Universitas Andalas (UNAND)</h3>
                <p>Universitas di Padang dengan program studi unggulan di bidang pertanian, kesehatan, dan ilmu sosial.</p>
            </div>
             <div class="card">
                <img src="{{ asset('build/assets/undip logo.png') }}" alt="Universitas Diponegoro (UNDIP)" />
                <h3>Universitas Diponegoro (UNDIP)</h3>
                <p>Universitas di Semarang dengan program studi teknik dan kesehatan.</p>
            </div>
        </div>
    </section>

 <footer style="background-color: #000000; color: #fff; padding: 1rem 1.5rem; font-family: 'Georgia', serif; max-width: 1500px; margin: 3rem auto 0 auto; border-radius: 0px; text-align: left;">
    <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Kontak Kami</h2>
    <p style="margin-bottom: 1rem;">Jurusanku adalah platform yang membantu mahasiswa mengenali minat dan bakat mereka untuk memilih jurusan yang tepat.</p>
    <p style="margin-bottom: 0.5rem;">Alamat: Jl. Contoh No. 123, Jakarta, Indonesia</p>
    <p style="margin-bottom: 0.5rem;">Telepon: (021) 123-4567</p>
    <p style="margin-bottom: 0.5rem;">Email: <a href="mailto:info@jurusanku.id" style="color: #7b121b; text-decoration: none; font-weight: 600;">info@jurusanku.id</a></p>
    <ul class="wrapper" style="display: inline-flex; list-style: none; padding-left: 0;">
        <li class="icon facebook" title="Facebook" style="position: relative; background: #ffffff; border-radius: 15px; padding: 15px; margin: 10px; width: 50px; height: 50px; font-size: 18px; display: flex; justify-content: center; align-items: center; cursor: pointer; box-shadow: 0 10px 10px rgba(0,0,0,0.1); transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
            <a href="https://facebook.com/jurusanku" target="_blank" rel="noopener noreferrer" style="color: #1877F2;"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="icon youtube" title="YouTube" style="position: relative; background: #ffffff; border-radius: 15px; padding: 15px; margin: 10px; width: 50px; height: 50px; font-size: 18px; display: flex; justify-content: center; align-items: center; cursor: pointer; box-shadow: 0 10px 10px rgba(0,0,0,0.1); transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
            <a href="https://youtube.com/jurusanku" target="_blank" rel="noopener noreferrer" style="color: #CD201F;"><i class="fab fa-youtube"></i></a>
        </li>
        <li class="icon tiktok" title="TikTok" style="position: relative; background: #ffffff; border-radius: 15px; padding: 15px; margin: 10px; width: 50px; height: 50px; font-size: 18px; display: flex; justify-content: center; align-items: center; cursor: pointer; box-shadow: 0 10px 10px rgba(0,0,0,0.1); transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
            <a href="https://tiktok.com/@jurusanku" target="_blank" rel="noopener noreferrer" style="color: #000000;"><i class="fab fa-tiktok"></i></a>
        </li>
        <li class="icon instagram" title="Instagram" style="position: relative; background: #ffffff; border-radius: 15px; padding: 15px; margin: 10px; width: 50px; height: 50px; font-size: 18px; display: flex; justify-content: center; align-items: center; cursor: pointer; box-shadow: 0 10px 10px rgba(0,0,0,0.1); transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
            <a href="https://instagram.com/jurusanku" target="_blank" rel="noopener noreferrer" style="color: #7a21b6;"><i class="fab fa-instagram"></i></a>
        </li>
    </ul>
</footer>



</body>
</html>
