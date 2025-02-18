<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'icon',
        'description',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'category_id');
    }
}
