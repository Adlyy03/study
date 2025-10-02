@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Edit Siswa</h1>
                    <p class="text-gray-600">Perbarui informasi data siswa</p>
                </div>
                <a href="{{ route('students.show', $student->id) }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg">
        <div class="p-6">
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Current Photo Display -->
                @if(!empty($student->foto))
                <div class="mb-6 text-center">
                    <div class="inline-block">
                        <img src="{{ asset($student->foto) }}" 
                             alt="Foto {{ $student->nama_lengkap }}" 
                             class="w-24 h-24 rounded-full object-cover border-4 border-[#977DFF] shadow-lg">
                        <p class="text-sm text-gray-600 mt-2">Foto saat ini</p>
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn', $student->nisn) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('nisn') border-red-500 @enderror" required>
                        @error('nisn')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $student->nama_lengkap) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('nama_lengkap') border-red-500 @enderror" required>
                        @error('nama_lengkap')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $student->tempat_lahir) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('tempat_lahir') border-red-500 @enderror">
                        @error('tempat_lahir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('alamat') border-red-500 @enderror">{{ old('alamat', $student->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $student->no_telp) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('no_telp') border-red-500 @enderror">
                        @error('no_telp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kelas</label>
                        <input type="text" name="kelas" value="{{ old('kelas', $student->kelas) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('kelas') border-red-500 @enderror">
                        @error('kelas')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
                        <select name="jurusan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('jurusan') border-red-500 @enderror">
                            <option value="">Pilih Jurusan</option>
                            <option value="PPLG" {{ old('jurusan', $student->jurusan) == 'PPLG' ? 'selected' : '' }}>Pengembangan Perangkat Lunak & Gim</option>
                            <option value="ANM" {{ old('jurusan', $student->jurusan) == 'ANM' ? 'selected' : '' }}>Animasi</option>
                            <option value="BCF" {{ old('jurusan', $student->jurusan) == 'BCF' ? 'selected' : '' }}>Broadcasting & Perfilman</option>
                            <option value="TO" {{ old('jurusan', $student->jurusan) == 'TO' ? 'selected' : '' }}>Teknik Otomotif</option>
                            <option value="TPFL" {{ old('jurusan', $student->jurusan) == 'TPFL' ? 'selected' : '' }}>Teknik Pengelasan</option>
                        </select>
                        @error('jurusan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Aktif</label>
                        <select name="is_active" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('is_active') border-red-500 @enderror">
                            <option value="1" {{ old('is_active', $student->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $student->is_active) == '0' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                        @error('is_active')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Siswa</label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('foto') border-red-500 @enderror">
                        <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah foto</p>
                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('students.show', $student->id) }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
