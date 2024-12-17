<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccineCenter extends Model
{
     protected $fillable = ['name', 'daily_limit'];
     public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
