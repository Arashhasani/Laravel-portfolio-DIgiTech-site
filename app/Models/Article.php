<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=[
        'user_id',
        'slug',
        'title',
        'text',
        'smallimage',
        'bigimage',
        'count_view',
        'is_published',
    ];



    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
        
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function published()
    {
        if ($this->is_published==1){
            return true;
        }else{
            return false;
        }

    }


}
