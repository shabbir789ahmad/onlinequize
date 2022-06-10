<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifeline extends Model
{
    use HasFactory;
    protected $fillable=['lifeline','user_id'];
}
