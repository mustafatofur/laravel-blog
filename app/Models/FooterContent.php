<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    use HasFactory;

    protected $fillable = [

        'footer_title', 'footer_content', 'copyright', 'footer_main_link_title'
    ];

}
