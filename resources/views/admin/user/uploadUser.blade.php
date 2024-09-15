@extends('layouts.admin.dashboard')
@section('content')
    {{-- <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('admin.users-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="file"
                        class="block mb-4 text-center font-bold text-2xl text-gray-900 dark:text-white">Upload Users Excel or
                        CSV File</label>
                    <input type="file" id="file" name="file"
                        class="block w-full text-sm text-gray-900 m-5 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none">
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import
                    Users</button>
            </form>
        </div>
    </div> --}}

    <div>
        <div class="text-center font-semibold space-y-5 mb-3">
            <h3>Upload Users</h3>
        </div>
        <div class="font-semibold text-right">
            <a href="{{ route('admin.users') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back
                </button>
            </a>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('admin.users-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file"
                        class="block mb-4 text-center font-bold text-2xl text-gray-900 dark:text-white">Upload Users CSV File</label>
                    <div class="flex justify-center">
                        <input type="file" id="file" name="file"
                            class="block text-sm text-gray-900 m-9 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none">
                        <button type="submit"
                            class="text-white m-9 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import
                            Users</button>
                    </div>
                </div>
            </form>
            <div class="ml-9">
                <p>An example of how to arrange your csv file for upload is shown below.</p>
                <table class="border-spacing-4 border-2 text-center m-4 px-6 py-4 font-medium">
                <thead>
                    <td class="border-2 px-3">name</td>
                    <td class="border-2 px-3">email</td>
                    <td class="border-2 px-3">password</td>
                    <td class="border-2 px-3">role</td>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-2 px-3">Zeus Adam</td>
                        <td class="border-2 px-3">zadam@email.com</td>
                        <td class="border-2 px-3">**********</td>
                        <td class="border-2 px-3">teacher</td>
                    </tr>
                    <tr>
                        <td class="border-2">Zita Godiya</td>
                        <td class="border-2">zadam@email.com</td>
                        <td class="border-2">**********</td>
                        <td class="border-2">student</td>
                    </tr>
                </tbody>
            </table>
            
            </div>
            

        </div>
    </div>
@endsection
