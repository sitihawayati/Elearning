<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefisikan field yang boleh diisi
    protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];

    /**
     * |==========================================================
     * |Laravel Relationship Methid
     * |================================
     * |1. One to One
     * |  - hasone()      = tabel saat ini meminjamkan id
     * |  - belongsTo     = tabel saat ini MEMINJAM id dari tabel lain
     * 
     * |2. One to Many / Many to one
     * |  - hasMany()          = tabel saat ini meminjamkan id
     * |  - belongsToMany()    = tabel saat ini MEMINJAM id dari tabel lain
     */

    // mendefinisikan relasi model Course
    public function course(){
        return $this->BelongsTo(Courses::class, 'courses_id');
    } 
}
