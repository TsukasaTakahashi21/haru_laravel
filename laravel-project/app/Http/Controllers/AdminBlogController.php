<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // 管理者用ブログ作成ページ
    public function create()
    {
        return view('admin.create_blog');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:50',
            'content' => 'required|string|',
        ]);

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $blog->image = basename($imagePath);
        }

        $blog->save();

        return redirect()->route('admin_blog.index');
    }

    // 管理者用ブログ一覧ページ
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog_lists', ['blogs' => $blogs]);
    }

    // 管理者用ブログ詳細ページ
    public function show($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        return view('admin.blog_detail', ['blog' => $blog]);
    }
}
