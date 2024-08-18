@extends('layouts.teacher.dashboard')
@section('content')
<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="relative border overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center font-bold text-2xl space-y-5 mb-3">
            <h2>Class User List</h2>
        </div>
        <form action="{{route('teacher.search-student')}}" method="GET" class="max-w-md mx-auto">
            @csrf
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="search" type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search name or email" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        <div class="font-semibold text-right">
            
                @if (Route::is('teacher.students'))
                    <a href="{{ route('teacher.dashboard') }}">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </button>
                </a>
                @else
                <a href="{{ route('teacher.students') }}">
                    <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back
                </button>
            </a>
                @endif
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
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $user)
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
                            Assigned |
                            @if (array_key_exists($user->class_id, $classnames))
                                {{$classnames[$user->class_id]}}
                            @endif
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
            {{ $students->links() }}
        </div>

    </div>
</div>
@endsection