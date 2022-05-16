<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[

       'question',
       'explanation',
       'hints',
       'marks',
       'quize_id',

    ];


    function options()
    {
        return $this->hasMany(QuestionOption::class );
    }
}
