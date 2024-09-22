<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $latestBlogs = Blog::latest()->take(4)->get();

        return view('home', compact('latestBlogs'));
    }

    public function blog_lists(Request $request)
    {
        $query = Blog::query();

        // キーワード検索
        if ($request->has('keyword') && !empty($request->input('keyword'))) {
            $query->where('title', 'like', '%' . $request->input('keyword'). '%')
            ->orWhere('content', 'like', '%' . $request->input('keyword'). '%');
        }

        // カテゴリー検索
        if ($request->has('category') && !empty($request->input('category'))) {
            $query->whereHas('categories', function($categoryQuery) use ($request) {
                $categoryQuery->where('categories.id', $request->input('category'));
            });
        }

        //並び順
        if ($request->has('order')) {
            if ($request->input('order') === 'newest') {
                $query->orderBy('created_at', 'desc');
            } else if ($request->input('order') === 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $blogs = $query->with('categories')->get();
        $categories = Category::all();

        return view('public_blog_lists', ['blogs' => $blogs, 'categories' => $categories]);
    }

    public function blog_detail($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        return view('public_blog_detail', ['blog' => $blog]);
    }

}
