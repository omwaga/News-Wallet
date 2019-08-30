<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

use App\Categories;

use App\Popular_news;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
   {
   	$news = News :: all();

    return view('news.home', compact('news'));
   }

   public function create(){
   	$categories = Categories::pluck('title', 'id');
  return view('news.create', ['categories' => $categories]);
   }

   public function store(Categories $category)
  {
    $attributes = request()->validate(['title' => 'required|min:3',
      'image' => 'required|min:3',
      'website' => 'required|min:3',
      'author' => 'required|min:3',
      'link' => 'required|min:3',
      'meta_description' => 'required|min:3'
  ]);

    $category->addNews($attributes);

    return back();
  }

   public function show(News $news){
    //abort_if($news->owner_id !== auth()->id(), 403);
    //inserting the number of views on the articles
    $popular_news = new Popular_news;
    $popular_news->owner_id = auth()->id();
    $popular_news->news_id = $news->id;
    $popular_news->save();
   	return view('news.show', compact('news'));
   }

   public function edit(News $news){
    return view('news.edit', compact('news'));
   }

   public function update(News $news)
    {
        $news->update(request(['title']));

        return redirect('/categories');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect('/categories');
    }

}
