<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
  protected $fillable = ['name','nohp'];

  public function matapilihs(){
    return $this->hasMany('App\Matapilih');
  }
  
}
