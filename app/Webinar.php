<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    //
    protected $fillable = ['judulwebinar','platform','tanggal','jam','keterangan1','keterangan2','poster','linkmateri'];
}
