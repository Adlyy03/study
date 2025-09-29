<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    @vite('resources/css/app.css') {{-- pastikan Tailwind aktif --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Sistem Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        @guest
            <!-- Kalau belum login -->
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Masuk</a>
        @endguest

        @auth
            <!-- Kalau sudah login -->
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg me-2">Dashboard</a>
        @endauth
    </nav>


    <!-- Hero Section -->
    <section class="text-center bg-light py-5">
        <div class="container">
            <h1 class="fw-bold">Selamat Datang di Sistem Sekolah</h1>
            <p class="lead">Portal untuk siswa, guru, dan admin sekolah</p>        </div>
    </section>



    @php
    // fallback: kalau $students tidak dikirim, ambil data langsung (quick-fix)
    use App\Models\Student;
    $students = $students ?? Student::latest()->take(6)->get();
@endphp
    <!-- Card Siswa -->
<section class="container py-5">
    <h2 class="mb-4 fw-bold">👨‍🎓 Siswa Terbaru</h2>
    <div class="row">
        @forelse($students as $student)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                  @if($student->foto)
                      <img src="{{ asset($student->foto) }}" class="card-img-top" alt="Foto {{ $student->nama_lengkap }}" style="height:200px; object-fit:cover;">
                  @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->nama_lengkap }}</h5>
                        <p class="card-text">
                            <strong>Kelas:</strong> {{ $student->kelas }} <br>
                            <strong>Jurusan:</strong> {{ $student->jurusan }}
                        </p>
                    </div>
                    <div class="card-footer text-muted small">
                        Terdaftar: {{ $student->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada siswa terdaftar.</p>
        @endforelse
    </div>
</section>



    <!-- About -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h2>Mengapa Memilih Sistem Ini?</h2>
            <p class="mb-0">Mudah digunakan, cepat, dan membantu kegiatan belajar mengajar.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        © 2025 Sistem Sekolah | Semua Hak Dilindungi
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>








</body>
</html>
