<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
//    protected $connection= 'crm';
    protected $fillable = [
        'image', 'active', 'title','content','created_at', 'updated_at'
    ];
}    //

