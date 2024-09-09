<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Contracts\TokenGenerator;

class RandomTokenGenerator implements TokenGenerator
{
  public function generateToken(): string 
  {
    return Str::random(32);
  }
}
