<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    protected $table = 'persona';
    use SoftDeletes;

    public function documento(){
        return $this->hasMany('App\Documentos', 'documentos_id');
    }
}
