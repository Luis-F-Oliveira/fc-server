<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_id',
        'servant_id',
    ];

    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }

    public function servant(): BelongsTo
    {
        return $this->belongsTo(Servants::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
