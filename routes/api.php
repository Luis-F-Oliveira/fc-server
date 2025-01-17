<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\RoleOnUserController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Data\DataController;
use App\Http\Controllers\Data\ReportController;
use App\Http\Controllers\Data\ServantsController;
use App\Http\Controllers\Email\NotifyController;
use App\Http\Middleware\CheckBotMiddleware;
use Illuminate\Support\Facades\Route;

Route::apiResource('servants', ServantsController::class);

Route::post('servants/import', [ServantsController::class, 'import']);

Route::apiResource('collected_data', DataController::class);

Route::apiResource('reports', ReportController::class);

Route::controller(NotifyController::class)->group(function () {
  Route::post('send_emails_by_ids', 'send_email_by_ids');
  Route::post('send_emails_by_date', 'send_email_by_date');
  Route::get('show_date', 'show_date');
});
