<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogposts extends Model
{
    use HasFactory;
    protected $fillable=['user_id','topics','title','author_name','blog_content'];
}
