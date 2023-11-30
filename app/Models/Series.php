<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function brand(): BelongsTo // many to one
    {
        return $this->belongsTo(Brand::class);
    }

    public function products(): HasMany // one to many
    {
        return $this->hasMany(Product::class);
    }
}
