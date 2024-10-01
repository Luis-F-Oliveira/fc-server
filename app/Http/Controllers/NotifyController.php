<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Mail\SendCollectedData;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
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
      $apiUrl = config('app.url') . "/confirmation_notification?email=$email";

      if ($servant->active) {
        Report::create([
          'data_id' => $items[0]->id,
          'servant_id' => $servant->id
        ]);

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
      $apiUrl = config('app.url') . "/confirmation_notification?email=$email";

      if ($servant->active) {
        Report::create([
          'data_id' => $items[0]->id,
          'servant_id' => $servant->id
        ]);

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
