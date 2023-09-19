<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(News $model)
    {
        $user = Auth::user();
        $news = $user->news;

        return view('news.index', compact('news'));
    }

    public function add()
    {
        return view('news.add');
    }

    public function store(Request $request)
    {
        $news=$request->all();
        $user_id=Auth()->user()->id;

        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|max:255',
        ]);

        News::create([
            'title' => $news['title'],
            'description' => $news['description'],
            'user_id' => $user_id,
        ]);
        
        return redirect('/news')->with('success', 'News created successfully');
    }

}
