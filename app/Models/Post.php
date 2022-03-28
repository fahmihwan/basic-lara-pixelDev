<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function getPostFromUser($id)
    {
        return $this->where('user_id', $id)->get();
    }

    //relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
