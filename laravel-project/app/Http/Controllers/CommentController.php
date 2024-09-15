<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function store(Request $request, $blogId)
    {
        $request->validate([
            'author' => 'required|string|max:50',
            'content' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $blogId,
            'author' => $request->input('author'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('admin_blog.detail', $blogId);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
