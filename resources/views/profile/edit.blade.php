@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
    <div class="space-y-8">
        <div>
            <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
                {{ __('Profile Settings') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Kelola informasi akun, keamanan, dan preferensi Anda.
            </p>
        </div>

        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
@endsection
