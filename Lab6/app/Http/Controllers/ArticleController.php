<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;




class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Article::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->user_id = 1;
        $article->save();
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): JsonResponse
    {
        return response()->json($article);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): JsonResponse
    {
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->save();
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): JsonResponse
    {
        $article->delete();
        return response()->json([
            'message' => 'Record deleted'
        ], 204);
    }
}
