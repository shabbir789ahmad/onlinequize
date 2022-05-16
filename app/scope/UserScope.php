<?php
  
namespace App\scope;
  
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
  use Auth;
class UserScope implements Scope
{
  
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('user_id', '=', Auth::id());
    }
}