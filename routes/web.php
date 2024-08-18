<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard/users', [AdminController::class, 'userIndex'])->name('admin.users');
Route::get('/admin/dashboard/users-create', [AdminController::class, 'createUser'])->name('admin.users-create');
Route::post('/admin/dashboard/users-store', [AdminController::class, 'storeUser'])->name('admin.users-store');
Route::delete('/admin/dashboard/delete/{user}', [AdminController::class, 'userDestroy'])->name('admin.user-delete');
Route::get('/admin/dashboard/edit/{user}', [AdminController::class, 'userEdit'])->name('admin.user-edit');
Route::put('/admin/dashboard/update/{user}', [AdminController::class, 'userUpdate'])->name('admin.user-update');
Route::put('/admin/dashboard/reset/{user}', [AdminController::class, 'userResetPassword'])->name('admin.user-reset');
// classroom routes
Route::resource('classroom', ClassroomController::class);
// Assign class user routes
Route::get('/admin/dashboard/classroom-assign', [ClassroomUserController::class, 'index'])->name('class.users');
Route::get('/admin/dashboard/classroom-assign/{user}', [ClassroomUserController::class, 'create'])->name('class.assign');
Route::post('/admin/dashboard/classroom-assign/{user}', [ClassroomUserController::class, 'store'])->name('class.store');
Route::get('/admin/dashboard/user', [SearchController::class, 'adminSearchUser'])->name('admin.search-user');
Route::get('/admin/dashboard/classuser', [SearchController::class, 'adminSearchClassUser'])->name('admin.search-classuser');


});
Route::middleware(['auth','role:student'])->group(function () {
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});


Route::middleware(['auth','role:teacher'])->group(function () {
Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
Route::get('/teacher/dashboard/students', [TeacherController::class, 'viewStudent'])->name('teacher.students');
Route::get('/teacher/dashboard/classroom', [TeacherController::class, 'viewClassroom'])->name('teacher.myclassroom');
Route::get('/teacher/dashboard/classroom/content', [TeacherController::class, 'classroomContent'])->name('classroom.content');
Route::post('/teacher/dashboard/classroom/content', [TeacherController::class, 'addContent'])->name('classroom.savecontent');
Route::get('/teacher/dashboard/classroom/content-list', [TeacherController::class, 'viewcontentList'])->name('classroom.contentlist');
Route::delete('/teacher/dashboard/classroom/content-delete/{content}', [TeacherController::class, 'destroyContent'])->name('teacher.content-delete');
Route::get('/teachet/dashboard/content', [SearchController::class, 'searchContent'])->name('teacher.search-content');
Route::get('/teachet/dashboard/student', [SearchController::class, 'searchStudent'])->name('teacher.search-student');


Route::get('teacher/profile', [TeacherController::class, 'profileedit'])->name('teacherprofile.edit');
Route::patch('teacher/profile', [TeacherController::class, 'profileupdate'])->name('teacherprofile.update');
Route::delete('teacher/profile', [TeacherController::class, 'destroy'])->name('teacher-profile.destroy');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test', function(){
    dd(phpinfo());
});


require __DIR__.'/auth.php';
