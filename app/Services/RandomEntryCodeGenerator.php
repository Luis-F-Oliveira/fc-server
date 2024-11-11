<?php

namespace App\Services;

use App\Contracts\EntryCode;
use App\Models\User;

class RandomEntryCodeGenerator implements EntryCode
{
  public function generateEntryCode(): string
  {
    $exists = User::pluck('entry_code')->toArray();

    do {
      $entryCode = strtoupper(random_int(100000, 999999));
    } while (in_array($entryCode, $exists));

    return $entryCode;
  }
}
