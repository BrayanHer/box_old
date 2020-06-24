<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class motivos extends Model
{
    use SoftDeletes;
    
    protected $table = 'motivos';
    protected $primaryKey ='ID_MOT';
    protected $fillable=['ID_MOT','Motivo'];

    protected $data = ['delete_at'];
}
