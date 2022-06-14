<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'path', 'type', 'mime', 'size', 'created_by'];
    public $timestamps = false;

    public function downloadable()
    {
        return $this->morphTo();
    }}
