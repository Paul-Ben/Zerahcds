@extends('layouts.admin.dashboard')
@section('content')
    <div>
        @if (Session::has('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> {{ Session::get('success') }}
                </div>
            </div>
            <div>
        @endif

        <div class="relative border overflow-x-auto shadow-md sm:rounded-lg">
            <div class="text-center font-semibold space-y-5 mb-3">
                <h2>Class User List</h2>
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
                            Class Assigned
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

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4">
                                @if (in_array($user->id, $classroomids))
                                   
                                    Assigned | 
                                    @if (array_key_exists($user->class_id, $classnames))
                                        {{$classnames[$user->class_id]}}
                                    @endif
                                @else
                                    Not Assigned
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('class.assign', $user) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Assign to
                                    Class</a>
                            </td>
                        </tr>
                    @empty
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
    </div>
@endsection
