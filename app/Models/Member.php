<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    use HasFactory;
    protected $fillable = ['member_code', 'fullname', 'email','phone','membership_type'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
