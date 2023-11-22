<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function nilais()
    {
        return $this->hasMany(NilaiProfil::class, 'event_id', 'id');
    }
}
