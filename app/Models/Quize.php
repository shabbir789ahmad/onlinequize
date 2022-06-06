<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Quize;
class Quize extends Model
{
    use HasFactory;
    protected $fillable=[
        'quize_name',
        'quize_images',
        'start_date',
        'start_time',
        'end_time',
        'time_per_question',
    ];

   protected function quizeName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
  

    
    public static function quizes()
    {
        return Quize::latest()->get();
    }

    
}
