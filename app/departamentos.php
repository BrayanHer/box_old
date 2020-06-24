<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departamentos extends Model
{
    use SoftDeletes;
    
    protected $table = 'departamentos';
    protected $primaryKey ='ID_DEPT';
    protected $fillable=['ID_DEPT','Nombre','ID_EMP'];

    protected $data = ['delete_at'];
}
