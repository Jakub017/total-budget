<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = ['planned_amount', 'real_amount', 'category', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
