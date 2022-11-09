<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook extends Model
{
    use HasFactory;

    protected $table = "flipbook";

    protected $fillable = ['name', 'content', 'status', 'desc'];
}
