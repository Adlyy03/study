@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('content')

<h2>Tambah Data Inventaris</h2>
<form action="{{ route('inventories.store') }}" method="POST">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label>Kategori</label>
      <input type="text" name="kategori" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Lokasi Barang</label>
      <input type="text" name="lokasi_barang" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
  </div>

  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
      <option value="tersedia">Tersedia</option>
      <option value="dipinjam">Dipinjam</option>
      <option value="rusak">Rusak</option>
    </select>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" checked>
    <label class="form-check-label">Aktif</label>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('inventories.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
