<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServantsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('servants', ServantsController::class);
Route::post('servants/import', [ServantsController::class, 'import']);
Route::apiResource('collected_data', DataController::class)->except(['update', 'destroy']);
Route::post('send_emails_by_ids', [NotifyController::class, 'send_email_by_ids']);
Route::post('send_emails_by_date', [NotifyController::class, 'send_email_by_date']);
Route::get('show_date', [NotifyController::class, 'show_date']);
Route::apiResource('reports', ReportController::class)->only('index', 'store');