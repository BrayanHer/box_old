<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_vales extends Model
{
    use SoftDeletes;
    
    protected $table = 'detalle_vales';
    protected $primaryKey ='ID_DVAL';
    protected $fillable=['ID_DVAL','ID_VAL','Concepto','Monto','UUID','Direfencia'];

    protected $data = ['delete_at'];
}
