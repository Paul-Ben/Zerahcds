@extends('layouts.teacher.dashboard')
@section('content')
    <div>
        <div class="text-center font-semibold space-y-5 mb-3">
            <h3>Add Content</h3>
        </div>
        <div class="font-semibold text-right">
            <a href="{{ route('teacher.myclassroom') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back
                </button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('classroom.savecontent') }}" method="POST" enctype="multipart/form-data"
                class="max-w-sm mx-auto mb-8">
                @csrf

                <div class="mb-5">
                    <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Topic</label>
                
                    @if (isset($topics))
                        <select name="topic" id="topic-select"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <option value="">Select Topic</option>
                            <option value="new-topic">New Topic</option>
                            {{-- @foreach ($topics as $topic)
                                <option value="{{ $topic->topic }}">{{ $topic->topic }}</option>
                            @endforeach --}}
                        </select>
                
                        <input type="text" id="topic-input" name="topic" style="display:none;"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="New Course Topic" />
                    @else
                        <input type="text" id="topic" name="topic"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="New Course Topic"  />
                    @endif
                </div>
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                        Title</label>
                    <input type="text" id="title" name="title"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Course Title" required />
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                        Description</label>
                    <textarea id="description" name="description"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Course Description" required></textarea>
                </div>
                <div class="mb-5">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        Content Type</label>
                        <select name="" id="type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        >
                        <option value="">Select Content Type</option>
                            <option value="video">Video</option>
                            <option value="document">PDF</option>
                            <option value="link">Link</option>
                        </select>
                </div>
                <div class="mb-5" id="videodiv" hidden>
                    <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        Video</label>
                    <input type="file" id="video" name="video"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        accept="video/*" />
                </div>
                <div class="mb-5" id="docdiv" hidden>
                    <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        Document</label>
                    <input type="file" id="document" name="document"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        accept=".pdf,.doc,.docx,.txt"  />
                </div>
                <div class="mb-5" id="link" hidden>
                    <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">External
                        Link</label>
                    <input type="url" id="link" name="external_link"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="External Link" />
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add Course Content</button>
            </form>
        </div>
    </div>
    
    <script src="{{asset('scripts/teacherScripts.js')}}"></script>

@endsection
