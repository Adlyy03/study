@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">NISN</label>
            <input type="text" name="nisn" value="{{ $student->nisn }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ $student->nama_lengkap }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="{{ $student->tempat_lahir }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Alamat</label>
            <textarea name="alamat" class="w-full border p-2 rounded">{{ $student->alamat }}</textarea>
        </div>

        <div>
            <label class="block">No Telp</label>
            <input type="text" name="no_telp" value="{{ $student->no_telp }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ $student->email }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Kelas</label>
            <input type="text" name="kelas" value="{{ $student->kelas }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Jurusan</label>
            <input type="text" name="jurusan" value="{{ $student->jurusan }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Status Aktif</label>
            <select name="is_active" class="w-full border p-2 rounded">
                <option value="1" {{ $student->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$student->is_active ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
