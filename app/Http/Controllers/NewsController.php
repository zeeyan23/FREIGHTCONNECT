<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    // Display all published news
    public function index()
    {
        $news = News::published()
            ->latest('published_at')
            ->paginate(9);

        return view('news.index', compact('news'));
    }

    // Display individual news article
    public function show($slug)
    {
        $article = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', compact('article'));
    }
}