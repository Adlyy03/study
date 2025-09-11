<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <div class="py-6 max-w-lg mx-auto">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                <input type="text" name="role" value="{{ old('role', $user->role) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Update User
                </button>
                <a href="{{ route('users.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
