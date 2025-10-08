@extends('layouts.app')
@section('title', 'Data Inventaris')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Data Inventaris</h2>
  <a href="{{ route('inventories.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>Kode</th>
      <th>Nama Barang</th>
      <th>Kategori</th>
      <th>Status</th>
      <th>Lokasi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($inventories as $inv)
    <tr>
      <td>{{ $inv->kode_barang }}</td>
      <td>{{ $inv->nama_barang }}</td>
      <td>{{ $inv->kategori }}</td>
      <td>{{ $inv->status }}</td>
      <td>{{ $inv->lokasi_barang }}</td>
      <td>
        <a href="{{ route('inventories.edit', $inv->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('inventories.destroy', $inv->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
