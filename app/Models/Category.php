<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'cat_id';
    protected $fillable = [
      'category_name', 'category_slug'
    ];

    public function posts() {
      return $this->hasMany(posts::class, 'cat_id');
    }
}
