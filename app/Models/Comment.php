<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['blog', 'user'];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter) {
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function ($query) use($search) {     
                $query->where('name', 'LIKE', '%'.$search.'%')
                      ->orwhere('email', 'LIKE', '%'.$search.'%')
                      ->orwhere('body', 'LIKE', '%'.$search.'%');
            });

            // $query->where('name', 'LIKE', '%'.$search.'%')
            //     ->orWhere('email', 'LIKE', '%' . $search . '%')
            //     ->orWhere('body', 'LIKE', '%' . $search . '%');

        });

        $query->when($filter['title'] ?? false, function ($query, $slug) {
            $query->whereHas('blog', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });
    }
}
