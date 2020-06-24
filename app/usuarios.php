<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    use SoftDeletes;
    
    protected $table = 'usuarios';
    protected $primaryKey ='ID_US';
    protected $fillable=['ID_US','Nombre','Nomina','Password','Tipo','ID_DEPT'];

    protected $data = ['delete_at'];
}
