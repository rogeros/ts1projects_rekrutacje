<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:3000',
        ]);

        $article = new Article();
        $article->title = $validatedData['title'];
        $article->body = $validatedData['body'];
        $article->user_id = auth()->id();
        $article->save();

       return redirect()->route('home')->with('status', 'Yupi. Your article has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article, string $id)
    {
        return view('article.show', ['article' => Article::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        return view('article.edit', ['article' => Article::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:3000',
        ]);

        $arcitle = Article::findOrFail($id);
        $arcitle->title = $validatedData['title'];
        $arcitle->body = $validatedData['body'];
        $arcitle->save();

        return redirect()->route('home')->with('status', 'Your article has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arcitle = Article::findOrFail($id);
        $arcitle->delete();
        return redirect()->route('home')->with('status', 'Your article has been deleted.');
    }
}
