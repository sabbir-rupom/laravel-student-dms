<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});

Route::get('/index', function () {
    return redirect('/');
});
Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    /**
     * Dashboard Routes
     */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    /**
     * Student Routes
     */
    Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student');
    Route::get('/admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('/admin/student/create', [StudentController::class, 'store']);
    Route::get('/admin/student/{student}', [StudentController::class, 'edit'])->name('admin.student.edit');
    Route::put('/admin/student/{student}', [StudentController::class, 'update']);
    Route::delete('/admin/student/{student}', [StudentController::class, 'delete'])->name('admin.student.delete');

    /**
     * Group Routes
     */
    Route::get('/admin/group', [GroupController::class, 'index'])->name('admin.group');
    Route::get('/admin/group/create', [GroupController::class, 'create'])->name('admin.group.create');
    Route::post('/admin/group/create', [GroupController::class, 'store']);
    Route::get('/admin/group/{group}', [GroupController::class, 'edit'])->name('admin.group.edit');
    Route::put('/admin/group/{group}', [GroupController::class, 'update']);
    Route::delete('/admin/group/{group}', [GroupController::class, 'delete'])->name('admin.group.delete');

    /**
     * Subject Routes
     */
    Route::get('/admin/subject', [SubjectController::class, 'index'])->name('admin.subject');
    Route::get('/admin/subject/create', [SubjectController::class, 'create'])->name('admin.subject.create');
    Route::post('/admin/subject/create', [SubjectController::class, 'store']);
    Route::get('/admin/subject/{subject}', [SubjectController::class, 'edit'])->name('admin.subject.edit');
    Route::put('/admin/subject/{subject}', [SubjectController::class, 'update']);
    Route::delete('/admin/subject/{subject}', [SubjectController::class, 'delete'])->name('admin.subject.delete');

    /**
     * Result Routes
     */
    Route::get('/admin/result', [ResultController::class, 'index'])->name('admin.result');
    Route::get('/admin/result/create', [ResultController::class, 'create'])->name('admin.result.create');
    Route::post('/admin/result/create', [ResultController::class, 'store']);
    Route::get('/admin/result/{result}', [ResultController::class, 'edit'])->name('admin.result.edit');
    Route::put('/admin/result/{result}', [ResultController::class, 'update']);
    // Route::delete('/admin/result/{result}', [ResultController::class, 'delete'])->name('admin.result.delete');

    /**
     * Auth Dependent Ajax Routes
     */
    Route::get('/ajax/group/subject/{id}', [AjaxController::class, 'getSubjectsByGroup'])->where('id', '[0-9]+');
});
