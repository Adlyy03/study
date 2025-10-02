@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Header -->
    <div class="mb-8">
      <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Dashboard Overview</h1>
        <p class="text-gray-600">Selamat datang kembali, Admin 👋</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-600 text-sm font-medium">Total Siswa</h2>
            <p class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">
              {{ \App\Models\Student::count() ?? 0 }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
              <i class="fas fa-arrow-up text-green-500 mr-1"></i>
              +{{ \App\Models\Student::whereDate('created_at', today())->count() }} hari ini
            </p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-[#977DFF] to-[#000C9E] rounded-xl flex items-center justify-center">
            <i class="fas fa-user-graduate text-white text-xl"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-600 text-sm font-medium">Total Users</h2>
            <p class="text-3xl font-bold bg-gradient-to-r from-green-500 to-green-700 bg-clip-text text-transparent">
              {{ \App\Models\User::count() ?? 0 }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
              <i class="fas fa-check-circle text-green-500 mr-1"></i>
              {{ \App\Models\User::whereNotNull('email_verified_at')->count() }} verified
            </p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-700 rounded-xl flex items-center justify-center">
            <i class="fas fa-users text-white text-xl"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-600 text-sm font-medium">Siswa Aktif</h2>
            <p class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-blue-700 bg-clip-text text-transparent">
              {{ \App\Models\Student::where('is_active', true)->count() ?? 0 }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
              <i class="fas fa-percentage text-blue-500 mr-1"></i>
              {{ \App\Models\Student::count() > 0 ? round((\App\Models\Student::where('is_active', true)->count() / \App\Models\Student::count()) * 100, 1) : 0 }}% dari total
            </p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl flex items-center justify-center">
            <i class="fas fa-user-check text-white text-xl"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-gray-600 text-sm font-medium">Total Aktivitas</h2>
            <p class="text-3xl font-bold bg-gradient-to-r from-purple-500 to-purple-700 bg-clip-text text-transparent">
              {{ (\App\Models\Student::count() + \App\Models\User::count()) ?? 0 }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
              <i class="fas fa-calendar text-purple-500 mr-1"></i>
              Bulan ini
            </p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-700 rounded-xl flex items-center justify-center">
            <i class="fas fa-chart-line text-white text-xl"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Table + Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      
      <!-- Table -->
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">Daftar Siswa Terbaru</h2>
          <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all duration-300 hover:scale-105">
            Lihat Semua
          </a>
        </div>
        <div class="overflow-hidden rounded-lg border border-gray-200">
          <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white">
              <tr>
                <th class="p-4 text-left font-semibold">Nama</th>
                <th class="p-4 text-left font-semibold">Kelas</th>
                <th class="p-4 text-left font-semibold">Status</th>
                <th class="p-4 text-left font-semibold">Tanggal Daftar</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
              <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                <td class="p-4 font-medium text-gray-900">{{ $student->nama_lengkap ?? 'N/A' }}</td>
                <td class="p-4 text-gray-600">{{ $student->kelas ?? '-' }}</td>
                <td class="p-4">
                  <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $student->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $student->is_active ? 'Aktif' : 'Non Aktif' }}
                  </span>
                </td>
                <td class="p-4 text-gray-600">{{ $student->created_at ? $student->created_at->format('d M Y') : '-' }}</td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="p-8 text-center text-gray-500">
                  <i class="fas fa-inbox text-4xl mb-4 block"></i>
                  Belum ada data siswa
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Chart -->
      <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-gray-200 shadow-lg">
        <h2 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-6">Distribusi Siswa per Kelas</h2>
        <div class="relative">
          <canvas id="kelasChart"></canvas>
        </div>
      </div>

    </div>

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
