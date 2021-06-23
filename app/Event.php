<?php

namespace App;

use App\EmailTemplate;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded = [];
    
    public function templates() {        
        return $this->belongsToMany(EmailTemplate::class)
            ->withPivot('name','subject','content','activity_id','activity_type_id','invitation_type_id','language_id');
    }

}
