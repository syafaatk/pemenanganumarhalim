<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matapilih extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama', 'alamat' , 'nik', 'rt', 'rw', 'tps', 'jenis_kelamin', 'kecamatan', 'kelurahan', 'nohp', 'admin', 'koordinators_id'
    ];

    public function koordinator(){
      return $this->belongsTo('App\Koordinator');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }


}
