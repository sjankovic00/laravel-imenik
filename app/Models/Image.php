<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Member;


class Image extends Model
{
    protected $fillable = ['filepath'];

    public function users()
    {
        return $this->belongsToMany(Member::class, 'user_images', 'image_id', 'user_id')
            ->withTimestamps();
    }
}
