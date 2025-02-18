<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $table = 'searches';

    protected $fillable = [
        'keyword',
        'search_type',
        'user_id', 
        'search_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
