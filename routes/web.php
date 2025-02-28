<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/enviar-email', [EmailController::class, 'send']);
