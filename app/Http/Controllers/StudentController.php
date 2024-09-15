<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  public function dashboard()
  {
    $user = Auth::user();

    $contents = Content::where('classroom_id', $user->class_id)->paginate(10);
    return view('student.dashboard', compact('contents'));
  }

  public function markAttendance(Request $request)
  {
    $user = Auth::user();
    $userId = $user->id;
    $user_name = $user->name;
    $classid = $user->class_id;
    $today = now()->toDateString();

    // Check if attendance has already been marked for today
    $attendance = Attendance::where('user_id', $userId)
      ->where('date', $today)
      ->first();
      
    if ($attendance) {
      return back()->with('success', 'Attendance already marked for today.');
    }

    // Mark attendance
    Attendance::create([
      'username' => $user_name,
      'user_id' => $userId,
      'class_id' => $classid,
      'date' => $today,
      'status' => 1, // Present
    ]);

    return back()->with('success', 'Attendance marked successfully.');
  }
}
