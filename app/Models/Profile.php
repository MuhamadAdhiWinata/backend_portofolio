<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'title', 'bio', 'profile_picture', 'email', 'phone', 'social_links'];

    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
}
