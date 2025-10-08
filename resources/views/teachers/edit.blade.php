@extends('layouts.app')
@section('title', 'Edit Guru')
@section('content')

<h2>Edit Data Guru</h2>
<form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
  @csrf @method('PUT')

  <div class="row mb-3">
    <div class="col-md-6">
      <label>NIP</label>
      <input type="text" name="nip" value="{{ $teacher->nip }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" value="{{ $teacher->nama_lengkap }}" class="form-control" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label>Jabatan</label>
      <input type="text" name="jabatan" value="{{ $teacher->jabatan }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>No HP</label>
      <input type="text" name="no_hp" value="{{ $teacher->no_hp }}" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ $teacher->alamat }}</textarea>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" {{ $teacher->is_active ? 'checked' : '' }}>
    <label class="form-check-label">Aktif</label>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
