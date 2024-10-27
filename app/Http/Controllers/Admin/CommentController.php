<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index() {
        return view('admin.comment.index', [
            'comments' => Comment::with('blog')->orderBy('id')
                ->filter(request(['search', 'title']))
                // ->get(),
                ->paginate(10)
                ->withQueryString(),

            'blogs' => Blog::all(),
        ]);
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return back()->with('success', 'Comment Successfully Deleted');
    }

    
}
