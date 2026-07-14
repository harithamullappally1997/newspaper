<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time().'.'.$image->extension();

            $image->move(public_path('uploads/news'), $imageName);
        }

        News::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.news.index')
            ->with('success','News Added Successfully');
    }

    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.news.edit', compact('news','categories'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'category_id'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);

        $imageName = $news->image;

        if($request->hasFile('image')){

            if($imageName && File::exists(public_path('uploads/news/'.$imageName))){
                File::delete(public_path('uploads/news/'.$imageName));
            }

            $image=$request->file('image');

            $imageName=time().'.'.$image->extension();

            $image->move(public_path('uploads/news'),$imageName);
        }

        $news->update([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'image'=>$imageName,
            'description'=>$request->description,
            'status'=>$request->status
        ]);

        return redirect()->route('admin.news.index')
            ->with('success','News Updated');
    }

    public function destroy(News $news)
    {
        if($news->image && File::exists(public_path('uploads/news/'.$news->image))){
            File::delete(public_path('uploads/news/'.$news->image));
        }

        $news->delete();

        return back()->with('success','News Deleted');
    }
}