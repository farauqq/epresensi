<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;
    protected $table = "absen";
    protected $fillable = [
        'token', 'tanggal'];
    public $timestamps = false;

}
