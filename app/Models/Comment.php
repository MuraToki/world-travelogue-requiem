<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //可変項目
    protected $fillable = [
        'user_id',
        'post_id',
        'comment'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
        
    public function posts(){
        return $this->hasMany(\App\Models\Post::class,'user_id', 'id');
    }
}
