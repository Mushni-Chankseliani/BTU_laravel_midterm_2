<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $table = 'blogs';
    public $fillable = ['user_id', 'title', 'text', 'slug'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
