<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_jadwal extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_jadwal';
    // protected $fillable = ['nama_dinas'];
    protected $guarded = NULL;
    public function pasien()
    {
        return $this->hasone(Users::class, 'id', 'id_pasien');
    }
    public function dokter()
    {
        return $this->hasone(Users::class, 'id', 'id_dokter');
    }
}
