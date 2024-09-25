<?php

namespace App\Http\Controllers;

use App\Contracts\TokenGenerator;
use App\Models\Data;
use App\Models\HandleNotifications;
use App\Mail\SendCollectedData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
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

  public function send_email_by_date(Request $request)
  {
    $date = $request->only('date');
    $data = Data::whereDate('created_at', $date)->get();

    $groupedData = [];
    foreach ($data as $item) {
      $servantId = $item->servant_id;
      if (!isset($groupedData[$servantId])) {
        $groupedData[$servantId] = [];
      }
      $groupedData[$servantId][] = $item;
    }

    foreach ($groupedData as $servantId => $items) {
      $servant = $items[0]->servant;
      $email = $servant->email;
      $date = $items[0]->created_at;
      $apiUrl = $this->generate_permission_url($email);

      if ($servant->active) {
        Mail::to($email)->send(new SendCollectedData($items, $servant, $apiUrl, $date));
        continue;
      }
    }

    return response()->json(['message' => 'E-mails enviados com sucesso'], 200);
  }

  public function send_email_by_ids(Request $request)
  {
    $data = Data::with('servant')->find($request);

    if (!$data) {
      return response()->json(['message' => 'Dados não encontrados'], 404);
    }

    $groupedData = [];
    foreach ($data as $item) {
      $servantId = $item->servant_id;
      if (!isset($groupedData[$servantId])) {
        $groupedData[$servantId] = [];
      }
      $groupedData[$servantId][] = $item;
    }

    foreach ($groupedData as $servantId => $items) {
      $servant = $items[0]->servant;
      $email = $servant->email;
      $date = $items[0]->created_at;
      $apiUrl = $this->generate_permission_url($email);

      if ($servant->active) {
        Mail::to($email)->send(new SendCollectedData($items, $servant, $apiUrl, $date));
        continue;
      }
    }

    return response()->json(['message' => 'E-mails enviados com sucesso'], 200);
  }

  public function show_date() 
  {
    return Data::selectRaw('DATE(created_at) as date')
      ->groupBy('date')
      ->get();
  }
}
