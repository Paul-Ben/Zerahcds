<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomUser;
use App\Models\User;
use Illuminate\Http\Request;

class ClassroomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->where('role', '!=', 'user')->paginate(10);
        $classroomids = ClassroomUser::pluck('user_id')->toArray();
        $classnames = Classroom::pluck('name', 'id')->toArray();


        return view('admin.classUsers.index', compact('users', 'classroomids', 'classnames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $classrooms = Classroom::all();
        return view('admin.classUsers.create', compact('user', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $check = ClassroomUser::where('user_id', $request->user_id)->first();
        if ($check) {
            return redirect()->back()->with('success', 'User is already in a classroom');
        }
        $request->validate([
            'classroom_id' => 'required',
            'role' => 'required',
        ]);
        ClassroomUser::create($request->all());

        // Update the user with the classroom_id
        $user = User::find($request->user_id);
        if ($user) {
            $user->class_id = $request->classroom_id;
            $user->save();
        }

        return redirect()->route('class.users')->with('success', 'Classroom User assigned to class successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassroomUser $classroomUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomUser $classroomUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassroomUser $classroomUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassroomUser $classroomUser)
    {
        //
    }
}
