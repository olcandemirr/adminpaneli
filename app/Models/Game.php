<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $table = 'games';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'played_count',
        'meta_title',
        'meta_description',
        'tags',
        'description',
        'game_link',
        'width',
        'height',
        'is_active',
        'image',
        'is_editor_choice'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
