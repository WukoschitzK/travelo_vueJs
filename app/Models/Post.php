<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'body', 'country', 'city', 'image_path'];

    public function getImageUrlAttribute() {

        return $this->image_path ? asset('storage/images/' . $this->image_path) : null;

    }

}
