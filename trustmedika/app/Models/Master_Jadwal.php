<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Jadwal extends Model
{
    use HasFactory;
    public $table = "master_jadwal";
    public $timestamps = false;
    protected $fillable = [
        'jadwal_poli_kode', 
        'jadwal_pegawai_nomor', 
        'jadwal_senin', 
        'jadwal_selasa', 
        'jadwal_rabu',
        'jadwal_kamis', 
        'jadwal_jumat', 
        'jadwal_sabtu',
        'jadwal_minggu'
    ];
    protected $guarded = ['jadwal_id'];
}
