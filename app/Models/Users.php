<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    // protected $fillable = ['nama_dinas'];
    protected $guarded = NULL;
    public function jadwal()
    {
        return $this->hasone(Jadwal_dokter::class, 'user_id');
    }
}
