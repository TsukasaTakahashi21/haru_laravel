<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // 管理者用ブログ作成ページ
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_blog', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:50',
            'content' => 'required|string|',
            'categories' => 'required|array'
        ]);

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $blog->image = basename($imagePath);
        }

        $blog->save();
        $blog->categories()->sync($request->categories);

        return redirect()->route('admin_blog.index');
    }

    // 管理者用ブログ一覧ページ
    public function index()
    {
        $blogs = Blog::with('categories')->get();
        return view('admin.blog_lists', ['blogs' => $blogs]);
    }

    // 管理者用ブログ詳細ページ
    public function show($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        return view('admin.blog_detail', ['blog' => $blog]);
    }

    // ブログ編集
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view ('admin.blog_edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'image' => 'nullable|image',
            'categories' => 'required|array'
        ]);

        $blog->update($request->only('title', 'content'));

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/images' . $blog->image);
            }

            $imagePath = $request->file('image')->store('public/images');
            $blog->image = basename($imagePath);
            $blog->save();
        }

        $blog->categories()->sync($request->categories);

        return redirect()->route('admin_blog.detail', ['id' => $blog->id]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin_blog.index');
    }
}
