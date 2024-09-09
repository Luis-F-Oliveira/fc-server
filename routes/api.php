<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ServantsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('servants', ServantsController::class);
Route::post('servants/import', [ServantsController::class, 'import']);
Route::apiResource('collected_data', DataController::class)->except(['update', 'destroy']);
Route::post('send_emails', [NotifyController::class, 'sendEmail']);