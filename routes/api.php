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
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('servants', ServantsController::class)
    ->middleware('ability:admin,coletador');

  Route::post('servants/import', [ServantsController::class, 'import'])
    ->middleware('ability:admin');

  Route::controller(DataController::class)->group(function () {
    Route::get('collected_data')
      ->middleware('ability:visualizador,coletador');
    Route::post('collected_data')
      ->middleware('ability:coletador');
    Route::get('collected_data/{ids}')
      ->middleware('ability:visualizador,coletador');
  });

  Route::apiResource('roles', RoleController::class)
    ->middleware('ability:admin');

  Route::apiResource('roles_on_users', RoleOnUserController::class)
    ->middleware('ability:admin');

  Route::get('permissions/{id}', [PermissionController::class, 'index'])
    ->middleware('ability:admin');

  Route::controller(ReportController::class)->group(function () {
    Route::get('reports')
      ->middleware('ability:visualizador');
    Route::post('reports')
      ->middleware('ability:coletador');
  });

  Route::controller(NotifyController::class)->group(function () {
    Route::post('send_emails_by_ids', 'send_email_by_ids')
      ->middleware('ability:remetente');
    Route::post('send_emails_by_date', 'send_email_by_date')
      ->middleware('ability:remetente');
    Route::get('show_date', 'show_date')
      ->middleware('ability:remetente');
  });

  Route::controller(AuthController::class)->group(function () {
    Route::delete('logout', 'destroy');
    Route::post('register', 'store');
  });

  Route::apiResource('users', UserController::class)
    ->except('store')
    ->middleware('ability:admin');
});

Route::post('login', [AuthController::class, 'index']);
