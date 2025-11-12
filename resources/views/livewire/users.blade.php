<div class="w-1/2 m-auto my-10">
    <h1 class="text-3xl font-semibold">{{ $title }}</h1>
    <h1>User Count: {{ $users->count() }}</h1>
    <button wire:click="createUser" type="button"
        class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 my-2 cursor-pointer">Create
        User</button>

    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
