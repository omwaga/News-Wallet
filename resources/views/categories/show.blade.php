@extends('layouts.master')
@section('content')<br>
<div class="container">
  <div style="display: flex; align-items: center;">
    <h1 style="margin-right: auto;">{{$category->title}}</h1>
    <button class="button is-success" onclick="window.location.href = '/categories/{{$category->id}}/edit';">Edit Category</button>
  </div>
  <div class="columns" style ="margin-top:1em">
    
    
    <div class="column">

      <h2>News in this Category</h2>
      @foreach ($category->news as $news)
      <div>
        <form method="POST" action="/News/ {{ $news->id}}">
          @method('PATCH')
          @csrf
          <div class="list is-hoverable">
            <a href="/news/{{$news->id}}" class="list-item">
              {{ $news->title}}
            </a>
          </div>
        </form>
      </div>
      @endforeach
    </div>
    <div class="column box">
      <h2 style="color: blue">Add News to this Category</h2>
      <form method="POST" action="/categories/{{$category->id}}/news">
        {{@csrf_field()}}
        <div class="field">
          News Title:<br>
          <input type="text" name="title" class="input" placeholder="News Title" required="" value="{{old('title')}}"><br>
        </div>
        <div class="field">
          Featured Image:<br>
          <input type="text" name="image" class="input" placeholder="News Featured Image" required="" value="{{old('image')}}" ><br>
        </div>
        <div class="field">
          Website Name:<br>
          <input type="text" name="website" class="input" placeholder="website Name" required="" value="{{old('website')}}"><br>
        </div>
        <div class="field">
          Article Author:<br>
          <input type="text" name="author" class="input" placeholder="News article author" required="" value="{{old('author')}}"><br>
        </div>
        <div class="field">
          Website Link:<br>
          <input type="text" name="link" class="input" placeholder="News website link" required="" value="{{old('link')}}"><br>
        </div>
        <div class="field">
          News Description:<br>
          <textarea name="meta_description" placeholder="News Description" class="textarea" required="">{{old('meta_description')}}</textarea> <br><br>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">Create News</button>
          </div>
        </div>
        @include('errors')
      </form>
    </div>
  </div>
</div>
@endsection