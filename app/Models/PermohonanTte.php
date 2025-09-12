<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanTte extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'jenis_kelamin',
        'nomor_telepon',
        'email',
        'jabatan',
        'golongan',
        'opds_id',
        'tanggal_permohonan',
        'foto_ktp',
        'status_permohonan'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_permohonan' => 'date'
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opds_id');
    }
}
