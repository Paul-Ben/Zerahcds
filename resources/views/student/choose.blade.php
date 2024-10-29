@extends('layouts.student.dashboard')
@section('content')
<div>
    <div class="text-center font-semibold space-y-5 mb-3">
        <h3>Choose Class</h3>
        @if (Session::has('success'))
        
            {{ Session::get('success') }}
           
        @endif
    </div>
    <div class="font-semibold text-right">
        <a href="{{ route('student.dashboard') }}">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back
            </button>
        </a>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="{{route('student.choice', $user)}}" method="POST" class="max-w-sm mx-auto mb-8">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User
                    Name</label>
                <input type="name" id="name" name="name" value="{{$user->name}}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="name@flowbite.com" disabled />
                    
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User
                    email</label>
                <input type="email" id="email" name="email" value="{{$user->email}}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="name@flowbite.com" disabled />
            </div>
            <div class="mb-5" hidden>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                User Role</label>
                <input type="text" name="role" id="role" value="{{$user->role}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                >    
            </div>
            <div class="mb-5">
                <label for="classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Choose Class</label>
                <select name="classroom_id" id="classroom_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                    <option value="">Choose Class</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{Str::ucfirst($classroom->name)}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                to Class</button>
        </form>

    </div>
</div>
    
@endsection
