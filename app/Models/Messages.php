<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'newsletter'];
    use HasFactory;
}
