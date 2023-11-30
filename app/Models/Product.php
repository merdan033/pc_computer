<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function isNew()
    {
        return $this->created_at >= Carbon::now()->subMonth() ? true : false;
    }


    public function hasDiscount()
    {
        return $this->discount_percent > 0 ? true : false;
    }


    public function price()
    {
        return round($this->price * (1 - $this->discount_percent / 100), 1) - 1;
    }
}
