<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
  // override the id primary key

    // protected $primaryKey = 'user_id';
  //

  /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
        protected $fillable = [
          'id','name','filename','url','extention','user_id','thumbnail'
        ];

        public function user(){
                return $this->belongsTo('App\User');
        }

        // public function getRouteKeyName()
        // {
        //     return 'slug';
        // }



}
