<?php

namespace App\Models;

use App\Models\Admin\DataKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRangeKriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'data_kriteria_id', 'id');
    }
}
