<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchContent(Request $request)
    {
        $search = $request->input('search');
        $contents = Content::where('topic', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(10);
           
        return view('teacher.classcontent', compact('contents'));
    }

    public function searchStudent(Request $request)
    {
        $search = $request->input('search');
        $students = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(10);
            $classnames = Classroom::pluck('name', 'id')->toArray();
        return view('teacher.classroom', compact('students', 'classnames'));
    }
}
