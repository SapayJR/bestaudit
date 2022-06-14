<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function translations(){
        return $this->hasMany(TaxTranslation::class);
    }

    public function translation(){
        return $this->hasOne(TaxTranslation::class);
    }
}
