<?php

namespace App\Http\Controllers\Email;

use App\Contracts\TokenGenerator;
use App\Http\Controllers\Controller;
use App\Mail\Confirmation;
use App\Models\HandleNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
  protected $tokenGenerator;

  public function __construct(TokenGenerator $tokenGenerator)
  {
    $this->tokenGenerator = $tokenGenerator;
  }

  private function generate_permission_url(string $email): string
  {
    $existingRecord = HandleNotifications::where('email', $email)->first();

    if ($existingRecord) {
      $token = $existingRecord->token;
    } else {
      $token = $this->tokenGenerator->generateToken();

      HandleNotifications::create([
        'email' => $email,
        'token' => $token,
        'created_at' => Carbon::now()
      ]);
    }

    return config('app.url') . "/disable_notification/$token?email=$email";
  }

  public function index(Request $request)
  {
    $email = $request->query('email');

    $permissionUrl = $this->generate_permission_url($email);

    Mail::to($email)->send(new Confirmation($permissionUrl));

    return response()->make('<script>window.close();</script>', 200, ['Content-Type' => 'text/html']);
  }
}
