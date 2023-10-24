<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['tag','kelkec_id','nohp'];
    
    public function posts(){
      return $this->belongsToMany('App\Post');
    }

    public function kelkec(){
      return $this->belongsTo('App\Kelkec');
    }
}
