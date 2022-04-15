<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //可変項目
    protected $fillable = [
        'user_id',
        'country',
        'content',
        'image'
    ];
        
    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }
              
    public function comment(){
        return $this->hasMany(\App\Models\Comment::class,'post_id', 'id');
    }
        
    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
