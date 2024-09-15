<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function userIndex()
  {
    $users = User::paginate(15);
    return view('admin.user.index', compact('users'));
  }

  public function userDestroy(User $user)
  {
    $user->delete();
    return redirect()->route('admin.users')->with('success', 'User deleted successfully');
  }

  public function createUser()
  {
    return view('admin.user.create');
  }

  public function uploadForm()
  {
    return view('admin.user.uploadUser');
  }

  public function storeUser(Request $request)
  {
  
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required', 'confirmed'],
    ]);
    

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]);

    event(new Registered($user));
    return redirect()->route('admin.users')->with('success', 'User created successfully');
  }

  public function userEdit(User $user)
  {
    return view('admin.user.edit', compact('user'));
  }

  public function userUpdate(Request $request, User $user)
  {
    
     $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255'], 
    ]);
    $user->update($request->all());
    return redirect()->route('admin.users')->with('success', 'User updated successfully');
  }

  public function userResetPassword(User $user)
  {
    $user->password = Hash::make('password');
    $user->save();
    return redirect()->route('admin.users')->with('success', 'User password reset successfully');
  }
}
