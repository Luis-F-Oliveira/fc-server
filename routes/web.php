<?php

use App\Http\Controllers\DesactivateNotification;
use Illuminate\Support\Facades\Route;

Route::get('disable_notification/{token}', [DesactivateNotification::class, 'index']);