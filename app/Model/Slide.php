<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $fillable = [
        'image', 'title', 'content','active', 'created_ad', 'updated_at'
    ];
}
