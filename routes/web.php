<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {return view('home');})->name('home');
Route::get('/mechanism-of-action', function () {return view('mechanism_of_action');})->name('mechanism-of-action');
Route::get('/efficacy-profile', function () {return view('efficacy-profile');})->name('efficacy-profile');
Route::get('/explore-lumirix-efficacy-f-vasi', function () {return view('explore-lumirix-efficacy-f-vasi');})->name('explore-lumirix-efficacy-f-vasi');
Route::get('/explore-lumirix-efficacy-t-vasi', function () {return view('explore-lumirix-efficacy-t-vasi');})->name('explore-lumirix-efficacy-t-vasi');
Route::get('/ruxolitinib-reports', function () {return view('ruxolitinib-reports');})->name('ruxolitinib-reports');
Route::get('/safety-profile', function () {return view('safety-profile');})->name('safety-profile');
Route::get('/dosing', function () {return view('dosing');})->name('dosing');
Route::get('/setting-expectations', function () {return view('setting-expectations');})->name('setting-expectations');
Route::get('/download', function () {return view('download');})->name('download');
Route::get('/patient-support', function () {return view('patient-support');})->name('patient-support');
Route::get('/terms-policy', function () {return view('terms-policy');})->name('terms-policy');
Route::get('/privacy-policy', function () {return view('privacy-policy');})->name('privacy-policy');

// Set access session
Route::post('/set-access-session', function () {
    session(['hcp_access_granted' => true]);
    return response()->json(['success' => true]);
})->name('set-access-session');

Route::post('/contact-message', [MessageController::class, 'store'])->name('contact.message');

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


