<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\News;

class CheckAuth
{
    //Verifique se o usuário é dono da notícia
    public function handle(Request $request, Closure $next)
    {
        $newsId = $request->route('id');
        $news = News::findOrFail($newsId);

        if ($news->user_id !== auth()->user()->id) {
            return redirect()->back();
        }

        return $next($request);
    }
}
