@extends('layouts.app')
@section('title', 'Data Guru')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Data Guru</h2>
  <a href="{{ route('teachers.create') }}" class="btn btn-primary">+ Tambah Guru</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>NIP</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>No HP</th>
      <th>Email</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($teachers as $t)
    <tr>
      <td>{{ $t->nip }}</td>
      <td>{{ $t->nama_lengkap }}</td>
      <td>{{ $t->jabatan }}</td>
      <td>{{ $t->no_hp }}</td>
      <td>{{ $t->email }}</td>
      <td>{{ $t->is_active ? 'Aktif' : 'Nonaktif' }}</td>
      <td>
        <a href="{{ route('teachers.edit', $t->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('teachers.destroy', $t->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
