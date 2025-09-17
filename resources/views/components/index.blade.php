<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Users
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-6">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                + Add User
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-left">ID</th>
                        <th class="px-6 py-3 border-b text-left">Name</th>
                        <th class="px-6 py-3 border-b text-left">Email</th>
                        <th class="px-6 py-3 border-b text-left">Role</th>
                        <th class="px-6 py-3 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 border-b">{{ $user->id }}</td>
                        <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                        <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-b">{{ $user->role }}</td>
                        <td class="px-6 py-4 border-b text-center">
                            <a href="{{ route('users.edit', $user->id) }}"
                            class="inline-block px-3 py-1 mr-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure want to delete this user?')"
                                    class="inline-block px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
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
</x-app-layout>
