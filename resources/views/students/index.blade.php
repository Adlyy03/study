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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"/>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
            margin: 20px;
        }

        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        table.dataTable thead th {
            background-color: #2563eb;
            color: #fff;
            font-weight: 600;
            padding: 12px 10px;
        }

        table.dataTable tbody td {
            padding: 10px;
        }

        table.dataTable tbody tr:hover {
            background-color: #f3f4f6;
        }

        .actions a, .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .actions a {
            background-color: #3b82f6;
            color: white;
        }

        .actions a:hover {
            background-color: #2563eb;
        }

        .actions button {
            background-color: #ef4444;
            color: white;
        }

        .actions button:hover {
            background-color: #b91c1c;
        }

        /* Center "Belum ada data" text */
        .dataTables_empty {
            text-align: center;
            color: #6b7280;
            font-style: italic;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    





<div class="flex h-screen bg-gray-100">



<div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">Sidebar</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('students.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">Student</a>
                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">Users</a>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                        Logout
                    </button>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200 px-4">
            <h1 class="font-semibold text-xl">Dashboard</h1>
            <div class="flex items-center space-x-4">
            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
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
                        <!-- Link ke Profil -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Tombol Logout dengan konfirmasi -->
                        <button onclick="event.preventDefault(); if(confirm('Yakin ingin logout?')) document.getElementById('logout-form').submit();"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                            {{ __('Log Out') }}
                        </button>

                        <!-- Form hidden untuk submit POST logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>


            </div>
        </div>













                                        <div class="table-container">
                                            <table id="students-table" class="display nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Kelas</th>
                                                        <th>Alamat</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($students as $student)
                                                    <tr>
                                                        <td>{{ $student->id }}</td>
                                                        <td>{{ $student->nama_lengkap }}</td>
                                                        <td>{{ $student->kelas }}</td>
                                                        <td>{{ $student->alamat }}</td>
                                                        <td>{{ $student->tempat_lahir }}</td>
                                                        <td>{{ $student->tanggal_lahir }}</td>
                                                        <td class="actions">
                                                            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7">Belum ada data siswa.</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

</div>


<!-- jQuery + DataTables JS + Extensions -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    $(document).ready(function () {
        $('#students-table').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
            columnDefs: [
                { orderable: false, targets: 6 } // kolom aksi tidak bisa di-sort
            ],
            dom: 'Bfrtip', // untuk tombol
            buttons: [
                { extend: 'excelHtml5', text: 'Export Excel' },
                { extend: 'pdfHtml5', text: 'Export PDF' },
                { extend: 'print', text: 'Print' }
            ]
        });
    });
</script>

</body>
</html>
