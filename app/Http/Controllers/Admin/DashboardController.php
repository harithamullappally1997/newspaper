<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();

        $totalNews = News::count();

        $publishedNews = News::where('status', 1)->count();

        $draftNews = News::where('status', 0)->count();

        $latestNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalCategories',
            'totalNews',
            'publishedNews',
            'draftNews',
            'latestNews'
        ));
    }
}