<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            background-color: #f9fafb;
        }
        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #1f2937;
            color: white;
            height: 100vh;
            position: fixed;
        }
        .sidebar a, .sidebar form button {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            margin-bottom: 2px;
            border-radius: 6px;
        }
        .sidebar a:hover, .sidebar form button:hover {
            background-color: #374151;
        }

        /* Main content */
        .main {
            margin-left: 240px;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Add button */
        .btn-add {
            padding: 8px 16px;
            background-color: #3b82f6;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-add:hover {
            background-color: #2563eb;
        }

        /* Table actions */
        .actions a, .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .actions a {
            background-color: #10b981;
            color: white;
        }
        .actions a:hover {
            background-color: #059669;
        }
        .actions button {
            background-color: #ef4444;
            color: white;
            border: none;
        }
        .actions button:hover {
            background-color: #b91c1c;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div style="padding:20px; font-weight:bold; text-align:center;">Sidebar</div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('students.index') }}">Student</a>
        <a href="{{ route('users.index') }}">User</a>
        <a href="{{ route('profile.edit') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- Main content -->
    <div class="main">


        <!-- Main Content Dashboard -->
<div class="flex-1 flex flex-col p-6 bg-gray-100">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
        <div class="flex items-center space-x-3">
            <input type="text" placeholder="Search..." class="px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded shadow p-4 flex items-center justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Users</h2>
                <p class="text-2xl font-bold text-gray-800">1,250</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <!-- Icon placeholder -->
                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 flex items-center justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Students</h2>
                <p class="text-2xl font-bold text-gray-800">540</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4 flex items-center justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Pending Tasks</h2>
                <p class="text-2xl font-bold text-gray-800">23</p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Chart & Table Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chart Placeholder -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-gray-700 font-semibold mb-4">Monthly Statistics</h2>
            <div class="h-64 flex items-center justify-center text-gray-400">
                <!-- Bisa diganti dengan chart JS -->
                Chart Placeholder
            </div>
        </div>

        
    </div>

</div>

    </div>

    <!-- JQuery + DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            new DataTable('#myTable', {
                responsive: true,
                pageLength: 5
            });
        });
    </script>
</body>
</html>
