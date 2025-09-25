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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">NISN</label>
            <input type="text" name="nisn" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Alamat</label>
            <textarea name="alamat" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label class="block">No Telp</label>
            <input type="text" name="no_telp" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Kelas</label>
            <input type="text" name="kelas" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Jurusan</label>
            <input type="text" name="jurusan" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Status Aktif</label>
            <select name="is_active" class="w-full border p-2 rounded">
                <option value="1">Aktif</option>
                <option value="0">Non Aktif</option>
            </select>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

</body>
</html>
