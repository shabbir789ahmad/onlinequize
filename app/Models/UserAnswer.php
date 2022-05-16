<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\scope\UserScope;
class UserAnswer extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'quize_id',
        'question_id',
        'question_option_id',
        'user_id',
        'user_question_id',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
  
        return static::addGlobalScope(new UserScope);
    }
}
