<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SupervisorMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LoginForm');
})->name('login');

Route::post('/Auth/Login', [UserController::class, 'login'])->name('login.handle');

Route::prefix('/Admin')->middleware([AdminMiddleware::class])->middleware('auth')->group(function(){
    Route::get('/Dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/User/Add', [UserController::class, 'create'])->name('create.user');
    Route::post('/User/Add/Handle', [UserController::class, 'store'])->name('store.user');

    Route::get('/User/{user}/Edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/User/{user}/Edit/Handle', [UserController::class, 'update'])->name('update.user');

    Route::get('/User/{user}/Delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/Students', [StudentController::class, 'index'])->name('admin.students');
    Route::get('/Student/Add', [StudentController::class, 'create'])->name('create.student');
    Route::post('/Student/Add/Handle', [StudentController::class, 'store'])->name('store.student');

    Route::get('/Student/{student}/Show', [StudentController::class, 'AdminShow'])->name('admin.show.student');

});

Route::prefix('/Accountant')->middleware([AccountantMiddleware::class])->middleware('auth')->group(function(){
    Route::get('/Dashboard', [UserController::class, 'accountantDashboard'])->name('accountant.dashboard');
    Route::get('/Student/{student}/Show', [StudentController::class, 'AccountantShow'])->name('accountant.show.student');
    Route::get('/Payment/{payment}/Update', [PaymentController::class, 'update'])->name('update.payment');

});

Route::prefix('/Supervisor')->middleware([SupervisorMiddleware::class])->middleware('auth')->group(function(){
    Route::get('/Dashboard', [UserController::class, 'supervisorDashboard'])->name('supervisor.dashboard');
    Route::get('/Student/{student}/Show', [StudentController::class, 'SupervisorShow'])->name('supervisor.show.student');
});

Route::get('/Logout', [UserController::class, 'logout'])->name('logout');
// Route::post('/User/Add/Handle', [UserController::class, 'store'])->name('store.user');
