@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Daftar User</h1>
                    <p class="text-gray-600">Kelola akun pengguna sistem dengan mudah</p>
                </div>
                <a href="{{ route('users.create') }}" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah User
                </a>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="usersTable" class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white">
                            <th class="p-4 text-left font-semibold">ID</th>
                            <th class="p-4 text-left font-semibold">Nama</th>
                            <th class="p-4 text-left font-semibold">Email</th>
                            <th class="p-4 text-left font-semibold">Email Verified</th>
                            <th class="p-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="p-4 font-medium text-gray-900">{{ $user->id }}</td>
                            <td class="p-4 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="p-4 text-gray-600">{{ $user->email }}</td>
                            <td class="p-4">
                                @if($user->email_verified_at)
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                        Verified
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                        Not Verified
                                    </span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600 transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Yakin mau hapus user ini?')">
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

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "ordering": true
    });
});
</script>
@endpush
