<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'status',
        'genre_id',
    ];

    // Relacionamento com o modelo Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
