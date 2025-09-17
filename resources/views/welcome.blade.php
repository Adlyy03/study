<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    @vite('resources/css/app.css') {{-- pastikan Tailwind aktif --}}
    <style>
        /* 🌈 Background animasi gradasi halus */
        .bg-animated-gradient {
            background: linear-gradient(-45deg, #667eea, #764ba2, #6ee7b7, #f43f5e);
            background-size: 300% 300%;
            animation: gradientMove 12s ease infinite;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ✨ Animasi melayang halus */
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-12px) scale(1.02); }
        }

        /* 🎇 Animasi shadow berdenyut */
        .pulse-shadow {
            animation: pulseShadow 3s ease-in-out infinite;
        }
        @keyframes pulseShadow {
            0%, 100% { box-shadow: 0 0 20px rgba(255,255,255,0.2); }
            50% { box-shadow: 0 0 35px rgba(255,255,255,0.35); }
        }

        /* 🖱️ Efek tombol hover lebih interaktif */
        .btn-glow {
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        .btn-glow::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 20%, transparent 70%);
            transform: rotate(25deg);
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
        }
        .btn-glow:hover::before {
            opacity: 1;
            animation: shine 1.5s linear;
        }
        @keyframes shine {
            0% { transform: translateX(-150%) rotate(25deg); }
            100% { transform: translateX(150%) rotate(25deg); }
        }
    </style>
</head>
<body class="bg-animated-gradient min-h-screen flex items-center justify-center p-4">

    <div class="relative w-full max-w-md bg-white/20 backdrop-blur-lg rounded-2xl px-10 py-12 text-center border border-white/30 floating pulse-shadow">

        <!-- Judul animasi typing -->
        <h1 class="text-4xl font-extrabold text-white mb-4 typing-text" id="typing"></h1>

        <p class="text-white/80 mb-8 leading-relaxed">
            Welcome to <span class="font-semibold text-white">my web</span><br>
            This is the default welcome page.
        </p>

        <!-- Tombol login & register -->
        <div class="flex flex-col gap-4">
            <a href="{{ route('login') }}" 
               class="btn-glow w-full py-3 rounded-lg bg-white text-indigo-600 font-semibold text-lg shadow hover:scale-105 hover:shadow-lg transition">
                Login
            </a>
            <a href="{{ route('register') }}" 
               class="btn-glow w-full py-3 rounded-lg bg-white text-purple-600 font-semibold text-lg shadow hover:scale-105 hover:shadow-lg transition">
                Register
            </a>
        </div>

    </div>

    <script>
        const text = "Belajar Laravel ";
        const typingSpeed = 150;
        const erasingSpeed = 100;
        const delayBetween = 1500;
        const typingElement = document.getElementById('typing');

        let index = 0;
        let typing = true;

        function type() {
            if (typing) {
                typingElement.textContent += text.charAt(index);
                index++;
                if (index < text.length) {
                    setTimeout(type, typingSpeed);
                } else {
                    typing = false;
                    setTimeout(type, delayBetween);
                }
            } else {
                typingElement.textContent = text.substring(0, index - 1);
                index--;
                if (index > 0) {
                    setTimeout(type, erasingSpeed);
                } else {
                    typing = true;
                    setTimeout(type, typingSpeed);
                }
            }
        }

        type();
    </script>
</body>
</html>
