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
    <body class="flex bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen transition-colors duration-300">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top Navigation Bar --}}
            <nav class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm p-4 transition-colors duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">
                            @yield('title', 'Dashboard')
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors duration-300">Welcome back, {{ Auth::user()->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </nav>

            {{-- Content Area --}}
            <div class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </div>
        </div>

        <!-- Dark Mode Script -->
        <script>
            // Dark mode functionality
            const darkModeToggle = document.getElementById('darkModeToggle');
            const html = document.documentElement;

            // Check for saved theme preference or default to 'light'
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            if (currentTheme === 'dark') {
                html.classList.add('dark');
            }

            darkModeToggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                
                // Save theme preference
                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });
        </script>
    </body>
</html>