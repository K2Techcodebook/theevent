<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class upevent extends Model
{
  protected $fillable = [
      'id','title', 'body','time'
  ];
}
