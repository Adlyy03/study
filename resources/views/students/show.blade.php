@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Detail Siswa</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p><strong>NISN:</strong> {{ $student->nisn }}</p>
        <p><strong>Nama:</strong> {{ $student->nama_lengkap }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $student->tempat_lahir }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $student->tanggal_lahir }}</p>
        <p><strong>Alamat:</strong> {{ $student->alamat }}</p>
        <p><strong>No Telp:</strong> {{ $student->no_telp }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Kelas:</strong> {{ $student->kelas }}</p>
        <p><strong>Jurusan:</strong> {{ $student->jurusan }}</p>
        <p><strong>Status:</strong> {{ $student->is_active ? 'Aktif' : 'Non Aktif' }}</p>
    </div>

    <a href="{{ route('students.index') }}"
       class="bg-gray-600 text-white px-4 py-2 rounded mt-4 inline-block">
       Kembali
    </a>
</div>
@endsection
