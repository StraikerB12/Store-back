<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Attachment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function attachments(){
        return $this->hasMany(Attachment::class); // Связь как Post один, Attachment много к Post
    }

    public function tags(){
        return $this->belongsToMany(Tag::class); // Связь могие ко многим
    }
}
