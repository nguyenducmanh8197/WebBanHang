<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
//    protected $connection= 'crm';
    protected $fillable = [
        'email', 'desc','created_at', 'updated_at'
    ];
}
