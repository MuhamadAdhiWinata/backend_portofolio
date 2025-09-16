<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'status'];

    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
}
