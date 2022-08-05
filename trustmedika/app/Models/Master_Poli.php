<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Poli extends Model
{
    use HasFactory;
    public $table = "master_poli";
    public $timestamps = false;
    protected $fillable = ['poli_kode', 'poli_nama'];
    protected $guarded = ['poli_id'];
}
