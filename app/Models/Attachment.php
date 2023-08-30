<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Attachment extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function post(){
        return $this->belongsTo(Post::class); // Связь как много Attachment к одному Post
    }
}
