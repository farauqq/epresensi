<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = [
        'nama', 'email', 'password', 'alamat', 'tgllhr'];
    public $timestamps = false;


    public function isAdmin(){
        // Tentukan kriteria untuk menentukan apakah pengguna adalah admin
        return $this->role === 'admin';
    }

}

