@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

  <!-- Main Content -->
<main class="flex-1 flex flex-col overflow-y-auto">

  <!-- Isi Konten (Unchanged) -->
  <div class="flex-1 p-4 md:p-8">
    
    <!-- Header -->
    <div class="mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
      <p class="text-gray-500">Selamat datang kembali, Admin 👋</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-500 text-sm">Total Siswa</h2>
            <p class="text-2xl font-bold">1,240</p>
          </div>
          <i data-lucide="users" class="w-8 h-8 text-indigo-600"></i>
        </div>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-500 text-sm">Total Kelas</h2>
            <p class="text-2xl font-bold">36</p>
          </div>
          <i data-lucide="book-open" class="w-8 h-8 text-green-600"></i>
        </div>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-500 text-sm">Guru Aktif</h2>
            <p class="text-2xl font-bold">54</p>
          </div>
          <i data-lucide="user-check" class="w-8 h-8 text-purple-600"></i>
        </div>
      </div>
    </div>

    <!-- Table + Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      
      <!-- Table -->
      <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-lg font-semibold mb-4">Daftar Siswa Terbaru</h2>
        <table class="w-full text-sm text-left border-collapse">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-3">Nama</th>
              <th class="p-3">Kelas</th>
              <th class="p-3">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-gray-50">
              <td class="p-3">Budi Santoso</td>
              <td class="p-3">XI RPL 1</td>
              <td class="p-3">2025-09-01</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="p-3">Siti Aminah</td>
              <td class="p-3">X TKJ 2</td>
              <td class="p-3">2025-09-03</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="p-3">Andi Saputra</td>
              <td class="p-3">XI RPL 2</td>
              <td class="p-3">2025-09-05</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Chart -->
      <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-lg font-semibold mb-4">Distribusi Siswa per Kelas</h2>
        <canvas id="kelasChart"></canvas>
      </div>

    </div>
  </div>
</main>

  <script>
    lucide.createIcons();

    const ctx = document.getElementById('kelasChart');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['X RPL', 'XI RPL', 'XII RPL', 'TKJ', 'DKV'],
        datasets: [{
          label: 'Jumlah Siswa',
          data: [120, 150, 100, 90, 60],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script>

@endsection
