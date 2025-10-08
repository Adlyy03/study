@extends('layouts.app')
@section('title', 'Edit Barang')
@section('content')

<h2>Edit Data Inventaris</h2>
<form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
  @csrf @method('PUT')

  <div class="row mb-3">
    <div class="col-md-6">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" value="{{ $inventory->kode_barang }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="{{ $inventory->nama_barang }}" class="form-control" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label>Kategori</label>
      <input type="text" name="kategori" value="{{ $inventory->kategori }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Lokasi Barang</label>
      <input type="text" name="lokasi_barang" value="{{ $inventory->lokasi_barang }}" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ $inventory->deskripsi }}</textarea>
  </div>

  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
      <option value="tersedia" {{ $inventory->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
      <option value="dipinjam" {{ $inventory->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
      <option value="rusak" {{ $inventory->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
    </select>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" {{ $inventory->is_active ? 'checked' : '' }}>
    <label class="form-check-label">Aktif</label>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ route('inventories.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
