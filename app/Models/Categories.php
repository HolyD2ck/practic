<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Categories extends Model
{

    use HasFactory;
    protected $table = 'категории';
    protected $fillable = [
        'название',
        'описание',
        'приоритет',
        'дата_создания',
        'возрастное_ограничение',
        'пупулярность',
        'количество_книг',
    ];

    // Связь с книгами (многие ко многим)
    public function books()
    {
        return $this->belongsToMany(Books::class, 'категория_книга', 'категория_id', 'книга_id');
    }
}
