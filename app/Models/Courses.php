<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    // mendefinisikan field yang boleh diisi
    protected $fillable = ['name', 'category', 'desc'];
}
