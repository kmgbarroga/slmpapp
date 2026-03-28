<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'postId',
        'id',
        'name',
        'email',
        'body'
    ];
}
