@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Detail Siswa</h1>
                    <p class="text-gray-600">Informasi lengkap data siswa</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('students.edit', $student->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200 inline-flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200 inline-flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Profile Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profile Photo & Status -->
        <div class="lg:col-span-1">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg p-6 text-center">
                <div class="mb-6">
                    @if(!empty($student->foto))
                        <img src="{{ asset($student->foto) }}" 
                             alt="Foto {{ $student->nama_lengkap }}" 
                             class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-gradient-to-r from-[#977DFF] to-[#000C9E] shadow-lg">
                    @else
                        <div class="w-32 h-32 rounded-full mx-auto bg-gradient-to-r from-[#977DFF] to-[#000C9E] flex items-center justify-center text-white text-4xl font-bold shadow-lg">
                            {{ substr($student->nama_lengkap, 0, 1) }}
                        </div>
                    @endif
                </div>
                
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $student->nama_lengkap }}</h2>
                <p class="text-gray-600 mb-4">{{ $student->kelas }} - {{ $student->jurusan }}</p>
                
                <div class="mb-4">
                    <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $student->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        <i class="fas {{ $student->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                        {{ $student->is_active ? 'Aktif' : 'Non Aktif' }}
                    </span>
                </div>

                <div class="text-sm text-gray-500">
                    <p><i class="fas fa-calendar mr-2"></i>Bergabung: {{ $student->created_at ? $student->created_at->format('d M Y') : '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Student Details -->
        <div class="lg:col-span-2">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-6">Informasi Pribadi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="border-l-4 border-[#977DFF] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">NISN</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->nisn ?: '-' }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#977DFF] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Tempat Lahir</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->tempat_lahir ?: '-' }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#977DFF] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Tanggal Lahir</label>
                                <p class="text-lg font-medium text-gray-900">
                                    @if($student->tanggal_lahir)
                                        {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d F Y') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                            
                            <div class="border-l-4 border-[#977DFF] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">No Telepon</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->no_telp ?: '-' }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-[#000C9E] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Email</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->email ?: '-' }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#000C9E] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Kelas</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->kelas ?: '-' }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#000C9E] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Jurusan</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->jurusan ?: '-' }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#000C9E] pl-4">
                                <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Terakhir Update</label>
                                <p class="text-lg font-medium text-gray-900">{{ $student->updated_at ? $student->updated_at->format('d M Y H:i') : '-' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    @if($student->alamat)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="border-l-4 border-gradient-to-b from-[#977DFF] to-[#000C9E] pl-4">
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Alamat</label>
                            <p class="text-lg font-medium text-gray-900 leading-relaxed">{{ $student->alamat }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
