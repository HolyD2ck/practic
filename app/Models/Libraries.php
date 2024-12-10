<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libraries extends Model
{
    use HasFactory;
    protected $table = 'библиотеки';
    protected $fillable = [
        'название',
        'адрес',
        'часы_работы',
        'открыта',
        'вместимость_книг',
        'дата_основания',
        'рейтинг',
    ];
}
