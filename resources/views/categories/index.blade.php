@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card-body">
    <div class="columns">
      <div class="column">
        <div style="display: flex; align-items: center;">
          <h1 style="margin-right: auto;">All Categories</h1>
          <button class="button is-success" onclick="window.location.href = '/categories/create';">Add Category</button>
        </div>
        
        <div class="list is-hoverable">
          @foreach ($categories as $category)
          <a href="/categories/{{$category->id}}" class="list-item">
            {{ $category->title}}
          </a>
          @endforeach
        </div>
        
      </div>
      <div class="column box">
        <div style="display: flex; align-items: center;">
          <h1 style="margin-right: auto;">Popular Categories</h1>
        </div>
        <div>
          <?php
          $popular_categories = DB::table('popular_categories')
          ->leftJoin('categories', 'popular_categories.category_id', 'categories.id')
          ->select('category_id', 'title', DB::raw("count(*) as total"))
          ->groupBy('category_id','title')
          ->orderby('total', 'DESC')
          ->take(6)
          ->get();
          ?>
          
          <div class="list is-hoverable">
            @foreach ($popular_categories as $popular_category)
            <a href="/categories/{{$category->id}}" class="list-item">
              {{ $popular_category->title}}
            </a>
            @endforeach
          </div>
          
        </div>

        <div style="display: flex; align-items: center;">
          <h1 style="margin-right: auto;">Popular Articles</h1>
        </div>
        <div>
          <?php
          $popular_news = DB::table('popular_news')
          ->leftJoin('news', 'popular_news.news_id', 'news.id')
          ->select('news_id', 'title', DB::raw("count(*) as total"))
          ->groupBy('news_id','title')
          ->orderby('total', 'DESC')
          ->take(6)
          ->get();
          ?>
          
          <div class="list is-hoverable">
            @foreach ($popular_news as $popular_articles)
            <a href="/news/{{$popular_articles->news_id}}/" class="list-item">
              {{ $popular_articles->title}}
            </a>
            @endforeach
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection