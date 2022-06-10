<?php

namespace App\Helpers;
use App\Models\LifeLine;
use Auth;
class LifeLineHelper{

	static function lifline()
    {
        return LifeLine::where('user_id',Auth::id())->first('lifeline');
    }
}