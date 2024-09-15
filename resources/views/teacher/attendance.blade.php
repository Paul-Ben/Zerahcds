@extends('layouts.teacher.dashboard')
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
        @endif

        <div class="relative border overflow-x-auto shadow-md sm:rounded-lg">
            <div class="text-center font-bold text-2xl space-y-5 mb-3">
                <h2>Class Attendance List</h2>
            </div>
            <div>
                <form action="{{ route('teacher.search-attendance') }}" method="GET" class="max-w-md mx-auto">
                    @csrf
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="flex">    
                        <input name="search" type="date" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search name or email" required />
                        <button type="submit"
                            class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>

                </form>
            </div>


            <div class="font-semibold text-right">

                @if (Route::is('classroom.attendance'))
                    <a href="{{ route('teacher.dashboard') }}">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Back
                        </button>
                    </a>
                @else
                    <a href="{{ route('classroom.attendance') }}">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Back
                        </button>
                    </a>
                @endif
                </a>
                @if ($attendance->count() > 0)
                    <a href="{{ route('teacher.export-attendance') }}">
                        <button type="button"
                            class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Download Attendance
                        </button>
                    </a>
                @else
                @endif

            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendance as $user)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->username }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->date }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->status === 1)
                                    Present
                                @else
                                    Absent
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
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center">
                {{ $attendance->links() }}
            </div>

        </div>
    </div>
@endsection
