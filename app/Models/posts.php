<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $table ='posts';
    protected $fillable = [
      'title', 'short_description', 'description', 'keywords', 'slug',  'active', 'counter', 'image', 'cat_id'
    ];



}
