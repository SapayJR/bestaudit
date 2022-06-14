<?php

namespace App\Models;

use App\Enums\CategoryType;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'type' => CategoryType::class
    ];

    public function scopeUpdatedDate($query, $updatedDate)
    {
        return $query->where('updated_at', '>', $updatedDate);
    }

    public function translations(){
        return $this->hasMany(CategoryTranslation::class);
    }

    public function translation(){
        return $this->hasOne(CategoryTranslation::class);
    }

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }


}
