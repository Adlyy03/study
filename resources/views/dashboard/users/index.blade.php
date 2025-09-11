<table class="min-w-full bg-white border">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
