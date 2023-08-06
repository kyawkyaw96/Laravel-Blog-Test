<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::when(request()->has("keyword"), function ($query) {
            $keyword = request()->keyword;
            $query->where("title", "like", "%" . $keyword . "%");
            $query->orWhere("desc", "like", "%" . $keyword . "%");
        })->paginate(7)->withQueryString();
        return view("article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //Model::create() ...use when u have nothing to do from request.u need to add fillable in model.
        //Model instance save() .. use when u have to do something like complicated logic like if() condition and other multiple statements from request
        $article = Article::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "user_id" => Auth::id(),
            "category_id" => $request->category,

        ]);
        return redirect()->route("article.index")->with("message", "$article->title is created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("article.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view("article.edit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        //Model instance save() .. use when u have to do something like complicated logic like if() condition and other multiple statements from request

        $article->title = $request->title;
        $article->desc = $request->desc;
        $article->category_id = $request->category;
        $article->update();

        return redirect()->route("article.index")->with('message', 'Update article successful');

        //Model::update() ...use when u have nothing to do from request.u need to add fillable in model.

        // $article->update([
        //     "title" => $request->title,
        //     "desc" => $request->desc,
        // ]);
        // return redirect()->route("article.index")->with("message", "$article->title is created");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('message', 'Delete article successful');
    }
}
