<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['kelurahan','kecamatan'];

    public function tags(){
        return $this->hasMany('App\Tag');
      }
}
