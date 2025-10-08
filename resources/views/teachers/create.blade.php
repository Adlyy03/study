@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')

<h2>Tambah Data Guru</h2>
<form action="{{ route('teachers.store') }}" method="POST">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <label>NIP</label>
      <input type="text" name="nip" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label>Jabatan</label>
      <input type="text" name="jabatan" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>No HP</label>
      <input type="text" name="no_hp" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required></textarea>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" checked>
    <label class="form-check-label">Aktif</label>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
