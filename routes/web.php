<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\QrCodeController;
Route::get('/', function () {
    return Inertia::render('Welcome');
});
Route::post('/create-qr', [QrCodeController::class, 'generateAndSend'])->name('create.qr');

require __DIR__.'/auth.php';
