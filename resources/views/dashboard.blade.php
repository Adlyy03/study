<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Users CRUD') }}
        </h2>

        


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Tombol Tambah -->
                    <a href="{{ route('users.create') }}"
                       class="mb-6 inline-block bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow-md transition">
                        + Add User
                    </a>

                    <!-- Tabel -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden text-sm">
                            <thead class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold">ID</th>
                                    <th class="px-6 py-3 text-left font-semibold">Name</th>
                                    <th class="px-6 py-3 text-left font-semibold">Email</th>
                                    <th class="px-6 py-3 text-center font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-6 py-3">{{ $user->id }}</td>
                                        <td class="px-6 py-3 font-medium">{{ $user->name }}</td>
                                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $user->email }}</td>
                                        <td class="px-6 py-3 text-center flex justify-center gap-3">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg shadow transition"
                                                        onclick="return confirm('Yakin hapus user ini?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>