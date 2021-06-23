<?php

namespace App;

use App\Area;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $guarded = [];

    
    public function area() {        
        return $this->belongsTo(Area::class);
    }
}
