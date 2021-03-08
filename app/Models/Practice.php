<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $table = 'practice_swimmings';

    protected $fillable = [
        'title',
        'style',
        'times',
        'content'
    ];
}
