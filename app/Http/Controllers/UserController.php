<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
  public function dashboard()
  {
    return view('user.dashboard');
  }

  public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        // Import the file
        Excel::import(new UsersImport, $request->file('file'));

        return redirect()->route('admin.users')->with('success', 'Users Imported Successfully!');
    }
}
