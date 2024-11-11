<?php

use App\Http\Controllers\Email\ConfirmationController;
use App\Http\Controllers\Email\DesactivateNotification;
use Illuminate\Support\Facades\Route;

Route::get('confirmation_notification', [ConfirmationController::class, 'index']);
Route::get('disable_notification/{token}', [DesactivateNotification::class, 'index']);