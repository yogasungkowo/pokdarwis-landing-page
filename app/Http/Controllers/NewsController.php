<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('pages.news.index');
    }
    
    public function detail($slug)
    {
        $article = Article::with(['category', 'user', 'tags'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
            
        // Increment view count
        $article->increment('view_count');
        
        // Get related articles
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('is_published', true)
            ->take(3)
            ->get();
        
        return view('pages.news.detail', compact('article', 'relatedArticles'));
    }
    
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $articles = Article::with(['category', 'user', 'tags'])
            ->where('category_id', $category->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);
        
        return view('pages.news.category', compact('category', 'articles'));
    }
    
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        
        $articles = Article::with(['category', 'user', 'tags'])
            ->whereHas('tags', function($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);
        
        return view('pages.news.tag', compact('tag', 'articles'));
    }
}
