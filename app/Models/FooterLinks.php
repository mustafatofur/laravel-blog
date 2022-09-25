<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinks extends Model
{
    use HasFactory;

    protected $fillable = [
      'footer_link_title', 'footer_link'
    ];

}
