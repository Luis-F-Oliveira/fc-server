<?php

namespace App\Contracts;

interface EntryCode
{
    public function generateEntryCode(): string;
}
