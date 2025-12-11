<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

// Language switching route
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

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


