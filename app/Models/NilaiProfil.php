<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiProfil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function dataranges()
    {
        return $this->belongsTo(DataRangeKriteria::class, 'data_range_kriteria_id', 'id');
    }
}
