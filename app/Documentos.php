<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentos extends Model
{
    protected $table = 'documentos';
    use SoftDeletes;

    // public function documentos(){
    //     return $this->hasOne('App\CatDocumentos', 'id');
    // }
}
