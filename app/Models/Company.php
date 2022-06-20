<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function userId()
    {
        return $this->belongsTo(User::class);
    }

    public function taxes()
    {
        return $this->belongsToMany(Tax::class, CompanyTax::class);
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
