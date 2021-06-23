<?php

namespace App;

use App\Guest;
use App\InvitationDetail;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    public function guests() {        
        return $this->belongsToMany(Guest::class)->withPivot('email','send_email','es_principal','app_ticket_id','ticket_qrcode','guest_id','guest_category_id','qr_path');
    }

    public function details() {        
        return $this->hasOne(InvitationDetail::class);
    }
}
