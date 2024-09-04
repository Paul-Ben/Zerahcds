<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomUser;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;


class TeacherController extends Controller
{
  public function dashboard()
  {
    $user = Auth::user();
    $students = User::where('class_id', $user->class_id)->where('role', 'student')->count();
    $classrooms = Classroom::where('teacher_id', $user->id)->count();
   
    return view('teacher.dashboard', compact('students', 'classrooms'));
  }

  public function viewStudent(User $user)
  {
    $user = Auth::user();
    $students = User::where('class_id', $user->class_id)->where('role', 'student')->paginate(10);
    $classnames = Classroom::pluck('name', 'id')->toArray();
    return view('teacher.classroom', compact('students', 'classnames'));
  }

  public function viewClassroom(User $user)
  {
    $user = Auth::user();
    $classrooms = Classroom::where('teacher_id', $user->id)->get();
    return view('teacher.myclassroom', compact('classrooms'));
  }

  public function classroomContent(User $user)
  {
    $user = Auth::user();
    $topics = Content::where('teacher_id', $user->id)->get();
    
    return view('teacher.classcontentform', compact('topics'));
  }

  public function addContent(Request $request, Content $content)
  {
    // Validate the incoming request data
    $request->validate([
      'topic' => 'required',
      'title' => 'required',
      'video' => 'nullable|file|mimes:mp4,mov,avi,mpeg|max:209,715,200', // 200MB max
      'document' => 'nullable|file|mimes:pdf|max:109,715,200', // 100MB max
    ]);

    // Assign request data to the content model
    $content->topic = $request->topic;
    $content->title = $request->title;
    $content->description = $request->description;
    $content->external_link = $request->external_link;
    $content->teacher_id = Auth::id();
    $content->classroom_id = Auth::user()->class_id;

    // Handle video upload
    if ($request->hasFile('video')) {
      $content->video = $this->storeFile($request->file('video'), 'videos');
    }

    // Handle document upload
    if ($request->hasFile('document')) {
      $content->document = $this->storeFile($request->file('document'), 'documents');
    }

    // Save the content model to the database
    $content->save();

    // Redirect to the teacher's classroom route with a success message
    return redirect()->route('teacher.myclassroom')->with('success', 'Class content added successfully.');
  }
  protected function storeFile($file, $directory)
  {
    return $file->store($directory, 'public');
  }

  public function viewcontentList()
  {
    $user = Auth::user();
    $contents = Content::where('teacher_id', $user->id)->paginate(10);
    return view('teacher.classcontent', compact('contents'));
  }

  public function destroyContent(Content $content)
  {
    // Check if the content has a video and delete it from the storage
    if ($content->video) {
      Storage::disk('public')->delete($content->video);
    }

    // Check if the content has a document and delete it from the storage
    if ($content->document) {
      Storage::disk('public')->delete($content->document);
    }
    // Delete the content model from the database
    $content->delete();
    // Redirect to the teacher's classroom route with a success message
    return redirect()->route('teacher.myclassroom')->with('success', 'Class content deleted successfully');
  }

  public function profileedit(Request $request)
  {
    $user = Auth::user();
    return view('teacher.profile-edit', compact('user'));
  }

  public function profileupdate(ProfileUpdateRequest $request)
  {
    // $user = Auth::user();
    $request->user()->fill($request->validated());

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    $request->user()->save();
    // Redirect to the teacher's profile edit route with a success message
    return redirect()->back()->with('success', 'Teacher profile updated successfully.');
  }
}
