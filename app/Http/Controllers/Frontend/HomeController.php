<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home Page
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        $latestNews = News::where('status', 1)
            ->latest()
            ->paginate(6);

        return view('frontend.home', compact('categories', 'latestNews'));
    }

    // News Details
    public function show($slug)
    {
        $categories = Category::orderBy('name')->get();

        $news = News::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $recentNews = News::where('status', 1)
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(5)
            ->get();

        return view('frontend.details', compact(
            'news',
            'categories',
            'recentNews'
        ));
    }

    // Category News
    public function category($id)
    {
        $categories = Category::orderBy('name')->get();

        $category = Category::findOrFail($id);

        $news = News::where('category_id', $id)
            ->where('status', 1)
            ->latest()
            ->paginate(6);

        return view('frontend.category', compact(
            'category',
            'categories',
            'news'
        ));
    }

    // Search
    public function search(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $keyword = $request->keyword;

        $news = News::where('status', 1)
            ->where('title', 'LIKE', "%{$keyword}%")
            ->paginate(6);

        return view('frontend.search', compact(
            'news',
            'keyword',
            'categories'
        ));
    }
}