@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Siswa</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Siswa
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table id="studentsTable" class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->kelas }}</td>
                        <td>{{ $student->jurusan }}</td>
                        <td>
                            <span class="badge {{ $student->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $student->is_active ? 'Aktif' : 'Non Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
