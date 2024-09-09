<?php

namespace App\Contracts;

interface TokenGenerator
{
    public function generateToken(): string;
}
