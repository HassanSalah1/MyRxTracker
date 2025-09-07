<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MechanismOfActionController;
use App\Http\Controllers\SafetyProfileController;
use App\Http\Controllers\EfficacyProfileController;
use App\Http\Controllers\ExploreEfficacyFvasiController;
use App\Http\Controllers\ExploreEfficacyTvasiController;
use App\Http\Controllers\RuxolitinibReportsController;
use App\Http\Controllers\SettingExpectationsController;
use App\Http\Controllers\DosingController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PatientSupportController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TermsPolicyController;
use App\Http\Controllers\PrivacyPolicyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/mechanism-of-action', [MechanismOfActionController::class, 'index'])->name('mechanism-of-action');
Route::get('/efficacy-profile', [EfficacyProfileController::class, 'index'])->name('efficacy-profile');
Route::get('/explore-lumirix-efficacy-f-vasi', [ExploreEfficacyFvasiController::class, 'index'])->name('explore-lumirix-efficacy-f-vasi');
Route::get('/explore-lumirix-efficacy-t-vasi', [ExploreEfficacyTvasiController::class, 'index'])->name('explore-lumirix-efficacy-t-vasi');
Route::get('/ruxolitinib-reports', [RuxolitinibReportsController::class, 'index'])->name('ruxolitinib-reports');
Route::get('/safety-profile', [SafetyProfileController::class, 'index'])->name('safety-profile');
Route::get('/setting-expectations', [SettingExpectationsController::class, 'index'])->name('setting-expectations');
Route::get('/dosing', [DosingController::class, 'index'])->name('dosing');
Route::get('/download', [DownloadController::class, 'index'])->name('download');
Route::get('/patient-support', [PatientSupportController::class, 'index'])->name('patient-support');
Route::get('/terms-policy', [TermsPolicyController::class, 'index'])->name('terms-policy');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');

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


