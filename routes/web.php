<?php

use App\Http\Controllers\Email\ConfirmationController;
use App\Http\Controllers\Email\DesactivateNotification;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('confirmation_notification', [ConfirmationController::class, 'index']);
Route::get('disable_notification/{token}', [DesactivateNotification::class, 'index']);
Route::get('redirect/{id}', [RedirectController::class, 'index']);