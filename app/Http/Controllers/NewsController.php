<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    //Retorna página de listagem de notícias do usuário logado || Listagem de notícias pelos parâmetros da pesquisa
    public function index(Request $request)
    {
        $search = $request->input('search');

        $user = auth()->user();

        $news = News::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        return view('news.index', compact('news'));
    }

    //Retorna página 'adicionar nova notícia'
    public function add()
    {
        return view('news.add');
    }

    //Cria uma nova notícia no banco
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

    //Retorna página 'editar notícia'
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    //Atualiza os dados da notícia no banco
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|max:255'
        ]);

        $news = News::findOrFail($id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');

        $news->save();

        return redirect('/news')->with('success', 'News updated successfully');
    }

    //Deleta a notícia do banco
    public function delete($id)
    {
        News::findOrFail($id);

        News::destroy($id);

        return redirect('/news')->with('success', 'News deleted successfully');
    }
}
