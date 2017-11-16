<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "profiles";
    protected $fillable = [
      'name', 'phone', 'email', 'address'
    ];
    public function scopeSearch($query, $s){
      return $query->where('name', 'like', '%' .$s. '%')
                    ->orWhere('phone', 'like', '%' .$s. '%')
                    ->orWhere('email', 'like', '%' .$s. '%')
                    ->orWhere('address', 'like', '%' .$s. '%');
    }
}
