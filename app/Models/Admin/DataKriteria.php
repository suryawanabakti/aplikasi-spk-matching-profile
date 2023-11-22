<?php

namespace App\Models\Admin;

use App\Models\DataRangeKriteria;
use App\Models\JenisKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenis_kriteria()
    {
        return $this->belongsTo(JenisKriteria::class, 'jenis_kriteria_id', 'id');
    }

    public function ranges()
    {
        return $this->hasMany(DataRangeKriteria::class,'data_kriteria_id','id');
    }
}
