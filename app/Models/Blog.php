<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['thumbnail', 'category', 'title', 'slug', 'body', 'user_id'];


    // protected $with = ['user', 'category', 'tag', 'comment'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->intro = Str::words(strip_tags($blog->body), 20);
        });
        
    }

    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class);
    }

    public function scopeFilter($query, $filter) {
        
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function ($query) use($search) {     
                $query->where('title', 'LIKE', '%'.$search.'%')
                      ->orwhere('body', 'LIKE', '%'.$search.'%');
            });
        });

        $query->when($filter['category'] ?? false, function($query, $slug) {
            $query->whereHas('category', function($query) use ($slug){
                //query ka category. ae category table ye slug column mr dynamically win lr tae $slug nae tu tr ko shar
                $query->where('slug', $slug);      
            });
        });

        $query->when($filter['tag'] ?? false, function($query, $slug) {
            $query->whereHas('tag', function($query) use ($slug){
                $query->where('slug', $slug);      
            });
        });

        $query->when($filter['username'] ?? false, function($query, $username) {
            $query->whereHas('user', function($query) use ($username){
                $query->where('username', $username);      
            });
        });
        
    }

}
