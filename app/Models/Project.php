<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'image', 'link', 'repo', 'category', 'tags', 'status'];

    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
}
