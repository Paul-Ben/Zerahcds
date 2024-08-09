@extends('layouts.admin.dashboard')
@section('content')
    <div>
        <div class="text-center font-semibold space-y-5 mb-3">
            <h3>Edit Class</h3>
        </div>
        <div class="font-semibold text-right">
            <a href="{{ route('classroom.index') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back
                </button>
            </a>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('classroom.update', $classroom) }}" method="POST" class="max-w-sm mx-auto mb-8">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class
                        Name</label>
                    <input type="name" id="name" name="name" value="{{ $classroom->name }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Class Name" required />
                </div>
                <div class="mb-5">
                    <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Assign Teacher</label>
                    <select id="teacher_id" name="teacher_id"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <option value="{{$classroom->teacher_id}}">{{$classroom->teacher_id}}</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update class</button>
            </form>

        </div>
    </div>
@endsection
