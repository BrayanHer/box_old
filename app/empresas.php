<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class empresas extends Model
{
    use SoftDeletes;
    
    protected $table = 'empresas';
    protected $primaryKey ='ID_EMP';
    protected $fillable=['ID_EMP','Nombre'];

    protected $data = ['delete_at'];
}
