<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matapilih extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama', 'alamat' , 'nik', 'rt', 'rw', 'tps', 'kabupaten', 'kecamatan', 'kelurahan', 'nohp', 'user_id', 'koordinator_id', 'is_manual'
    ];

    public function koordinator(){
      return $this->belongsTo('App\Koordinator');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }


}
