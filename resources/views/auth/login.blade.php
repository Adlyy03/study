<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide-icons@latest/dist/umd/lucide.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body>
    <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 px-4 py-10">
        <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-xl">
            <!-- Header -->
            <div class="mb-8 text-center">
                <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" alt="Logo" class="mx-auto mb-4 w-36">
                <h3 class="text-2xl font-bold text-gray-900">Sign in to your account</h3>
                <p class="mt-2 text-sm text-gray-600">Welcome back! Please enter your details</p>
            </div>

            <!-- Google Button -->
            <a href="#" class="mb-6 flex w-full items-center justify-center gap-3 rounded-xl border border-gray-300 bg-white py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100">
                <img src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png" class="h-5" alt="Google">
                Sign in with Google
            </a>

            <div class="flex items-center py-4">
                <hr class="flex-grow border-gray-300">
                <span class="px-3 text-xs text-gray-500">OR</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        placeholder="you@example.com"
                        class="mt-1 w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700" />
                    <x-text-input id="password" type="password" name="password" required
                        placeholder="Enter your password"
                        class="mt-1 w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center gap-2">
                        <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded text-blue-600 focus:ring-blue-500">
                        <span class="text-gray-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <x-primary-button class="w-full rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-blue-700 focus:ring-4 focus:ring-blue-200">
                    {{ __('Sign In') }}
                </x-primary-button>
            </form>

            <!-- Register -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">Sign up</a>
            </p>
        </div>
    </div>

</body>
</html>