<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;
    protected $table = 'книги';
    protected $fillable = [
        'название',
        'автор',
        'дата_публикации',
        'цена',
        'страницы',
        'доступность',
        'рейтинг',
        'добавлено',
    ];

    // Связь с категориями (многие ко многим)
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'категория_книга', 'книга_id', 'категория_id');
    }
}
