<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $guarded =[];
    
    protected $dates = ['fecha_resolucion','fecha_inicio', 'fecha_fin'];


}
