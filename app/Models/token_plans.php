<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class token_plans extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','packagename', 'price', 'username','email','price'
  ];
}
