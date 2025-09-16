<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testinmonial extends Model
{
    protected $fillable = ['message', 'avatar', 'status', 'project_id', 'contact_id'];

    /** @use HasFactory<\Database\Factories\TestinmonialFactory> */
    use HasFactory;
}
