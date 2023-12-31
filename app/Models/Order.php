<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

      protected  $guarded = [];

      public function user(): BelongsTo
      {
          return $this->belongsTo(User::class, 'user_id');
      }
      public function meal(): BelongsTo
      {
          return $this->belongsTo(Meal::class, 'meal_id');
      }
}
