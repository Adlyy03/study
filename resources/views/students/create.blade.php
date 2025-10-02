@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Tambah Siswa Baru</h1>
                    <p class="text-gray-600">Lengkapi form di bawah untuk menambahkan siswa baru</p>
                </div>
                <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg">
        <div class="p-6">

            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No Telp</label>
                        <input type="text" name="no_telp" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kelas</label>
                        <input type="text" name="kelas" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
                        <select name="jurusan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                            <option value="">Pilih Jurusan</option>
                            <option value="PPLG">Pengembangan Perangkat Lunak & Gim</option>
                            <option value="ANM">Animasi</option>
                            <option value="BCF">Broadcasting & Perfilman</option>
                            <option value="TO">Teknik Otomotif</option>
                            <option value="TPFL">Teknik Pengelasan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Aktif</label>
                        <select name="is_active" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Siswa</label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200">
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('students.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
