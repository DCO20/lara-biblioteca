<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['code', 'name', 'slug','category_id', 'image', 'description'];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
