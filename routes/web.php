<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');})->name('home');
Route::get('/mechanism-of-action', function () {return view('mechanism_of_action');})->name('mechanism-of-action');
Route::get('/efficacy-profile', function () {return view('efficacy-profile');})->name('efficacy-profile');
Route::get('/explore-lumirix-efficacy', function () {return view('explore-lumirix-efficacy');})->name('explore-lumirix-efficacy');
Route::get('/ruxolitinib-reports', function () {return view('ruxolitinib-reports');})->name('ruxolitinib-reports');
Route::get('/safety-profile', function () {return view('safety-profile');})->name('safety-profile');
Route::get('/dosing', function () {return view('dosing');})->name('dosing');
Route::get('/setting-expectations', function () {return view('setting-expectations');})->name('setting-expectations');
Route::get('/download', function () {return view('download');})->name('download');
Route::get('/patient-support', function () {return view('patient-support');})->name('patient-support');
Route::get('/terms-policy', function () {return view('terms-policy');})->name('terms-policy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/export-attendees/{event}', [EventController::class, 'exportAttending'])->name('filament.export-attendees');
});

require __DIR__.'/auth.php';


