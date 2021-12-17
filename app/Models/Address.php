<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
    }

    public function publisher(): HasOne
    {
        return $this->hasOne(Publisher::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
