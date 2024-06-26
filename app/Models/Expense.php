<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['planned_amount', 'real_amount', 'category', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
