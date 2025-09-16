<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'level', 'icon', 'category'];

    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;
}
