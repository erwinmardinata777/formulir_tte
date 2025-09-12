<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $fillable = ['nama_opd', 'status'];

    public function permohonanTtes()
    {
        return $this->hasMany(PermohonanTte::class, 'opds_id');
    }
}
