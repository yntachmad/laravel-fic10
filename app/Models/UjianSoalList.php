<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UjianSoalList extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id',
        'soal_id',
        'kebenaran',
    ];

    public function soal(){
        return $this->belongsTo(Soal::class);
    }
    public function ujian(){
        return $this->belongsTo(Ujian::class);
    }
}
