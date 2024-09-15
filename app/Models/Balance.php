<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'user_id', 'amount',
    ];

    // Relasi dengan model User
    protected $table = 'balances';
    protected $attributes = [
        'amount' => 0,
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
