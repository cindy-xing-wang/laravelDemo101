<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistLogController;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']], function(){
    Route::resource('staffs', StaffController::class);
    Route::resource('checklists', ChecklistController::class);
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/calendars', function () {
        return view('checklistLog.index');
    });
    Route::resource('checklistLogs', ChecklistLogController::class);
    Route::post('/checklistLogs/check', [ChecklistLogController::class, 'check'])->name('checklistLog.check');
    Route::get('/export-excel/{id}', [ChecklistLogController::class, 'exportIntoExcel']);
});