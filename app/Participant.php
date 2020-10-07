<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    protected $fillable = ['nama','institusi','nohandphone','email','id_webinar','buktipembayaran'];

    public function webinar() {
        return $this->belongsTo('App\Webinar');
    }
}
