<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  public function dashboard()
  {
    $user = Auth::user();
   
    $contents = Content::where('classroom_id', $user->class_id )->paginate(10);
    return view('student.dashboard', compact('contents'));
  }
}
