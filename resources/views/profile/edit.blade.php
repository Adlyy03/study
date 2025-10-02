@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-[#977DFF] to-[#000C9E] flex items-center justify-center text-white text-2xl font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent mb-2">Profile Settings</h1>
                    <p class="text-gray-600">Kelola informasi akun, keamanan, dan preferensi Anda</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Information Card -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">Informasi Profil</h2>
                <div class="flex items-center space-x-4">
                    @if(Auth::user()->email_verified_at)
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                            <i class="fas fa-check-circle mr-1"></i>
                            Email Verified
                        </span>
                    @else
                        <span class="px-3 py-1 bg-red-100 text-red-800 text-sm rounded-full">
                            <i class="fas fa-times-circle mr-1"></i>
                            Email Not Verified
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border-l-4 border-[#977DFF] pl-4">
                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Nama Lengkap</label>
                    <p class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</p>
                </div>
                
                <div class="border-l-4 border-[#000C9E] pl-4">
                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Email</label>
                    <p class="text-lg font-medium text-gray-900">{{ Auth::user()->email }}</p>
                </div>
                
                <div class="border-l-4 border-[#977DFF] pl-4">
                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Bergabung Sejak</label>
                    <p class="text-lg font-medium text-gray-900">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d F Y') : '-' }}</p>
                </div>
                
                <div class="border-l-4 border-[#000C9E] pl-4">
                    <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Terakhir Update</label>
                    <p class="text-lg font-medium text-gray-900">{{ Auth::user()->updated_at ? Auth::user()->updated_at->format('d M Y H:i') : '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Forms -->
    <div class="space-y-8">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
@endsection
