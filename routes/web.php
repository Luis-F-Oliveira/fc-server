<?php

use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DesactivateNotification;
use Illuminate\Support\Facades\Route;

Route::get('confirmation_notification', [ConfirmationController::class, 'index']);
Route::get('disable_notification/{token}', [DesactivateNotification::class, 'index']);