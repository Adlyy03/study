<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>

    <style>
        body { font-family: 'Figtree', sans-serif; background-color: #f9fafb; }
        /* Sidebar */
        .sidebar { width: 240px; background-color: #1f2937; color:white; height:100vh; position:fixed; }
        .sidebar a, .sidebar form button { display:block; padding:12px 20px; color:white; text-decoration:none; margin-bottom:2px; border-radius:6px; transition: background 0.2s; }
        .sidebar a:hover, .sidebar form button:hover { background-color:#374151; }
        /* Buttons */
        .btn-add { background-color:#3b82f6; color:white; padding:8px 16px; border-radius:6px; text-decoration:none; font-weight:500; transition:0.2s; }
        .btn-add:hover { background-color:#2563eb; }
        .actions a, .actions button { margin-right:5px; padding:5px 10px; border-radius:6px; font-size:0.9rem; cursor:pointer; text-decoration:none; transition:0.2s; }
        .actions a { background-color:#10b981; color:white; }
        .actions a:hover { background-color:#059669; }
        .actions button { background-color:#ef4444; color:white; border:none; }
        .actions button:hover { background-color:#b91c1c; }
        /* DataTable row hover */
        table.dataTable tbody tr:hover { background-color: #f3f4f6 !important; }
    </style>
</head>
<body>

<div class="flex">

    <!-- Sidebar -->
    <div class="sidebar flex flex-col">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="font-bold uppercase">Sidebar</span>
        </div>
        <nav class="flex-1 px-2 py-4 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('students.index') }}" class="hover:bg-gray-700">Student</a>
            <a href="{{ route('users.index') }}" class="hover:bg-gray-700">Users</a>
            <a href="{{ route('profile.edit') }}" class="hover:bg-gray-700">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left hover:bg-gray-700">Logout</button>
            </form>
        </nav>
    </div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col ml-64 p-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6 h-16 bg-white border-b border-gray-200 px-4 rounded shadow-sm">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

        <!-- Add User Button -->
        <div class="mb-4">
            <a href="{{ route('users.create') }}" class="btn-add">+ Add User</a>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto bg-white rounded shadow">
            <table id="myTable" class="display stripe hover w-full">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center actions">
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus user ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            pageLength: 5,
            stripeClasses: ['stripe1', 'stripe2'],
        });
    });
</script>

</body>
</html>