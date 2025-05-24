<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Jurusanku</title>
    <style>
        html {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#30142b, #a12727);
        }
        header {
            background-color: white;
            color: #7b121b;
            padding: 0rem 2rem;
            font-weight: 700;
            font-size: 1.125rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        header h1 img {
            height: 1.20em;
            width: auto;
            margin-right: 0.5rem;
            vertical-align: middle;
        }
        nav a {
            margin-left: 1.5rem;
            font-weight: 600;
            color: #7b121b;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #7b121b;
        }
        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px;
        }
        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }
        .login-box .user-box {
            position: relative;
        }
        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }
        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }
        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: #f68e44;
            font-size: 12px;
        }
        .login-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #b79726;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            background: none;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .login-box form button:hover {
            background: #f49803;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 1px #9a8f2f,
                        0 0 5px #6e6219,
                        0 0 10px #8a8a1a,
                        0 0 20px #7a7a1a;
        }
        .login-box form button span {
            position: absolute;
            display: block;
        }
        .login-box form button span:nth-child(1) {
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
        .login-box form button span:nth-child(2) {
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
        .login-box form button span:nth-child(3) {
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
        .login-box form button span:nth-child(4) {
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
        .register-link {
            margin-top: 1rem;
            text-align: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .register-link a {
            color: #f68e44;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>
            <img src="{{ asset('build/assets/favicon.svg') }}" alt="Logo" />
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
    <div class="login-box">
        <h2>Login</h2>
        @if ($errors->any())
            <div style="color: #f68e44; margin-bottom: 1rem;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="user-box">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="background: transparent; color: white; border-bottom: 1px solid white;" />
                <label for="email">Email</label>
            </div>
            <div class="user-box">
                <input id="password" type="password" name="password" required autocomplete="current-password" style="background: transparent; color: white; border-bottom: 1px solid white;" />
                <label for="password">Password</label>
            </div>
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </button>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>
</body>
</html>
