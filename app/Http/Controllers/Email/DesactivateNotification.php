<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\DesactivateNotify;
use App\Models\HandleNotifications;
use App\Models\Servants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DesactivateNotification extends Controller
{
    public function index(Request $request, string $token)
    {
        $email = $request->query('email');
        $permission = HandleNotifications::where('token', $token)->first();

        if ($permission) {
            $permission->delete();

            $servant = Servants::where('email', $email)->first();
            $servant->update([
                'active' => false
            ]);

            Mail::to($email)->send(new DesactivateNotify());
        }

        return response()->make('<script>window.close();</script>', 200, ['Content-Type' => 'text/html']);
    }
}
