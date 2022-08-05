<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Pegawai extends Model
{
    use HasFactory;
    public $table = "master_pegawai";
    public $timestamps = false;
    protected $fillable = ['pegawai_nomor', 'pegawai_nama'];
    protected $guarded = ['pegawai_id'];
}
