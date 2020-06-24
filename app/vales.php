<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vales extends Model
{
    use SoftDeletes;
    
    protected $table = 'vales';
    protected $primaryKey ='ID_DEPT';
    protected $fillable=['ID_VAL','Folio','ID_DEPT','ID_MOT','Monto','Tipo','Estado','Fecha_Comprobar','Solicitud','Aprobacion'];

    protected $data = ['delete_at'];
}
