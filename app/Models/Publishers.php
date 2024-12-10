<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publishers extends Model
{
    use HasFactory;
    protected $table = 'издатели';
    protected $fillable = [
        'название',
        'адрес',
        'телефон',
        'email',
        'год_основания',
        'активность',
        'сайт',
    ];
}
