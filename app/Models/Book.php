<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'members_id', 'title', 'author', 'isbn','publication_year','copies_available'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}