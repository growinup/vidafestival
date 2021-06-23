<?php

namespace App;

use App\Invitation;
use Illuminate\Database\Eloquent\Model;

class InvitationDetail extends Model
{
    protected $guarded = [];
    
    public function invitation() {        
        return $this->belongsTo(Invitation::class);
    }
}
