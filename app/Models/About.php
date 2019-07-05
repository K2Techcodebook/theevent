<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id','title', 'body','user_id'
  ];
}
