<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
  protected $fillable = ['name','nohp','keterangan'];

  public function matapilihs(){
    return $this->hasMany('App\Matapilih');
  }
  
}
