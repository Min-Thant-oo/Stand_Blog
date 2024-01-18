<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function comments() {
        return view('admin.comment.comment', [
            'comments' => Comment::orderBy('id')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),

            'blogs' => Blog::all(),
        ]);
    }

    public function cmtDestroy(Comment $comment) {
        $comment->delete();
        return back()->with('success', 'Comment Successfully Deleted');
    }

    
}
