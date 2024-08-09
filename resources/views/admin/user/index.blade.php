@extends('layouts.admin.dashboard')
@section('content')
    {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"> --}}


    <div class="relative border overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center font-semibold space-y-5 mb-3">
            <h2>User List</h2>
        </div>
        <div class="font-semibold text-right">
            <a href="{{ route('admin.users-create') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add User
                </button>
            </a>

        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>

                        <td class="flex px-6 py-4">
                            <div>
                                <form method="POST" action="{{ route('admin.user-delete', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.user-edit', $user) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit |</a>

                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete
                                    </button>
                                </form>
                            </div>

                            <form method="POST" action="{{ route('admin.user-reset', $user) }}">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="text-green-600 hover:text-red-900"> | Reset Password
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No data
                        </th>
                        <td class="px-6 py-4">
                            No data
                        </td>
                        <td class="px-6 py-4">
                            No data
                        </td>
                        <td class="px-6 py-4">
                            No data
                        </td>
                        <td class="px-6 py-4">
                            No Data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
            {{ $users->links() }}
        </div>

    </div>

    {{-- </div> --}}
@endsection
