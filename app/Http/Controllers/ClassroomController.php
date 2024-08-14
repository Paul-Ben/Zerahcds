<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();

        return view('admin.classes.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.classes.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Classroom::create($request->all());
        return redirect()->route('classroom.index')->with('success', 'Classroom created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom, User $user)
    {
        $teachers = User::where('role', 'teacher')->get();
       
        return view('admin.classes.edit', compact('classroom', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $classroom->update($request->all());
        return redirect()->route('classroom.index')->with('success', 'Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success', 'Classroom deleted successfully');
    }
}
