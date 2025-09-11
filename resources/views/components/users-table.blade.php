<div class="overflow-x-auto shadow-lg rounded-lg">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase border-b">ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase border-b">Name</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase border-b">Email</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase border-b">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition-colors duration-200">
                <td class="px-6 py-4 border-b text-gray-800">{{ $user->id }}</td>
                <td class="px-6 py-4 border-b text-gray-800">{{ $user->name }}</td>
                <td class="px-6 py-4 border-b text-gray-800">{{ $user->email }}</td>
                <td class="px-6 py-4 border-b">
                    <a href="{{ route('users.edit', $user->id) }}" class="inline-block px-3 py-1 mr-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
