<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'body', 'country', 'city', 'image_path'];

    public function getImageUrlAttribute() {

        return $this->image_path ? asset('storage/images/' . $this->image_path) : null;

    }

    public function getImagePathAttribute() {
        return Storage::url($this->attributes["image_path"]);
    }

}
