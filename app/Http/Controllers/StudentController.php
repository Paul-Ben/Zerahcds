<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\ClassroomUser;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  public function dashboard()
  {
    $user = Auth::user();
    $classroom = Classroom::where('id', $user->class_id)->first();
    $contents = Content::where('classroom_id', $user->class_id)->paginate(10);
    return view('student.dashboard', compact('contents', 'classroom'));
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

  public function chooseCourse()
  {
    $user = Auth::user();
    $classrooms = Classroom::all();

    return view('student.choose', compact('user', 'classrooms'));
  }

  public function chosenCourse(Request $request)
  {
    $user = Auth::user();
    $userId = $user->id;

    $request->validate([
      'classroom_id' => 'required|exists:classrooms,id', // Ensuring classroom exists
      'role' => 'required|string'
    ]);

    $check = ClassroomUser::where('user_id', $userId)->first();

    if ($check) {
      $check->update([
        'classroom_id' => $request->classroom_id,
        'role' => $request->role,
      ]);
    } else {
      ClassroomUser::create([
        'user_id' => $userId,
        'classroom_id' => $request->classroom_id,
        'role' => $request->role,
      ]);
    }

    $user = User::find($userId);
    $user->class_id = $request->classroom_id;
    $user->save();

    return redirect()->route('student.dashboard')->with('success', 'Course chosen successfully.');
  }
}
