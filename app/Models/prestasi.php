<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['nama','jenis_prestasi','skor'];
    protected $table = 'prestasi';
    public $timestamps = false;
}
