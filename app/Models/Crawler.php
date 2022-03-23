<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    use HasFactory;

    protected $table = "crawls_result";
    protected $fillable = [
        'title',
        'address',
        'phone'
    ];

}
