<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'cover_image', 'published_at', 'tags', 'author_id'];

    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
}
