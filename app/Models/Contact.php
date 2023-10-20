<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =[
        'email',
        'phone',
        'facebook_url',
        'instegram_url',
        'twitter_url',
        'logo'
    ];
}
