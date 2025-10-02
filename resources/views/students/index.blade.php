@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Daftar Siswa</h1>
                    <p class="text-gray-600">Kelola data siswa dengan mudah dan efisien</p>
                </div>
                <a href="{{ route('students.create') }}" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Siswa
                </a>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="studentsTable" class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white">
                            <th class="p-4 text-left font-semibold">NISN</th>
                            <th class="p-4 text-left font-semibold">Nama</th>
                            <th class="p-4 text-left font-semibold">Kelas</th>
                            <th class="p-4 text-left font-semibold">Jurusan</th>
                            <th class="p-4 text-left font-semibold">Status</th>
                            <th class="p-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($students as $student)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="p-4 font-medium text-gray-900">{{ $student->nisn }}</td>
                            <td class="p-4 font-medium text-gray-900">{{ $student->nama_lengkap }}</td>
                            <td class="p-4 text-gray-600">{{ $student->kelas }}</td>
                            <td class="p-4 text-gray-600">{{ $student->jurusan }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $student->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $student->is_active ? 'Aktif' : 'Non Aktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('students.show', $student->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition-colors duration-200">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600 transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
