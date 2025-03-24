<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'phone_number', 'address', 'email', 'description', 'website',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'user_images', 'user_id', 'image_id')
            ->withTimestamps();
    }
}
