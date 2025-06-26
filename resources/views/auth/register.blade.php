<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Register - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body class="bg-black">
    <div class="min-h-screen flex items-start justify-center pt-[72px] px-[20px]">
        <form method="POST" action="{{ route('register') }}" class="w-1/3 p-6 bg-gray-900 rounded shadow-lg">
            @csrf
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:228px; height:62px;" />
                </a>
            </div>

            <h1 class="text-white mt-[50px] mb-6 text-4xl">Criar conta</h1>

            <div class="flex flex-wrap gap-5 mb-4">
                <div class="flex-1 min-w-[200px]">
                     <label for="name" class="block font-bold mb-1 text-white">Nome</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required 
                        class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
  
                <div class="flex-1 min-w-[200px]">
                    <label for="email" class="block font-bold mb-1 text-white">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
            </div>


            <div class="mb-4">
                <label for="password" class="block font-bold mb-1 text-white">Senha</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                       class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block font-bold mb-1 text-white">Confirmar senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline text-white">Já tem cadastro?<strong>acesse a conta</strong></a>
                <button 
                    style="
                        background-color:#f97316; 
                        color: black; 
                        border-radius: 0.5rem; 
                        padding: 20px 40px;  /* aumenta o padding vertical e horizontal */
                        display: inline-block;
                        width: 200px;        /* largura fixa */
                        height: 60px;        /* altura fixa */
                        font-size: 1.125rem; /* opcional, deixa o texto maior */
                    ">
                    Criar conta
                </button>


            </div>
        </form>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
