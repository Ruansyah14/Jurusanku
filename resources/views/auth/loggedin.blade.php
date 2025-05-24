<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Anda Sudah Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(#30142b, #a12727);
            color: #0d1a26;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-container {
            background: rgba(0,0,0,0.5);
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
            width: 400px;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        h2 {
            color: white;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: white;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        a, .btn-primary {
            padding: 0.75rem 2rem;
            background-color: #f49803;
            color: white;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        a:hover, .btn-primary:hover {
            background-color: #f4c803;
            box-shadow: 0 0 1px #9a8f2f,
                        0 0 5px #6e6219,
                        0 0 10px #8a8a1a,
                        0 0 20px #7a7a1a;
        }
        a span, .btn-primary span {
            position: absolute;
            display: block;
        }
        a span:nth-child(1), .btn-primary span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #f4c003);
            animation: btn-anim1 1s linear infinite;
        }
        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }
            50%,100% {
                left: 100%;
            }
        }
        a span:nth-child(2), .btn-primary span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #f4bc03);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s;
        }
        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }
            50%,100% {
                top: 100%;
            }
        }
        a span:nth-child(3), .btn-primary span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #f4dc03);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s;
        }
        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }
            50%,100% {
                right: 100%;
            }
        }
        a span:nth-child(4), .btn-primary span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #f4b003);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s;
        }
        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }
            50%,100% {
                bottom: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Selamat Anda Sudah Login!</h2>
        <p>Selamat datang kembali! Anda sudah berhasil masuk ke akun Anda.</p>
        <div class="btn-group">
            <a href="{{ url('/') }}">Kembali ke Beranda</a>
            <a href="{{ route('quiz') }}" class="btn-primary">Mulai Tes Sekarang</a>
        </div>
    </div>
</body>
</html>
