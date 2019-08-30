@extends('layouts.master')
@section('content')<br>
<div class="container">
<form method="POST" action="/news/{{ $news->id}}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf
  
  <div class="field">
    <label class="label" for="title">News Title:<br></label>
    <input type="text" name="title" class="input" placeholder="News Title" value="{{$news->title}}"><br>
  </div>
  <div class="field">
    <label class="label" for="title">Featured Image:<br></label>
    <input type="text" name="image" class="input" placeholder="Featured Image" value="{{$news->image}}"><br>
  </div>
  <div class="field">
    <label class="label" for="title">Website Name:<br></label>
    <input type="text" name="website" class="input" placeholder="website" value="{{$news->website}}"><br>
  </div>
  <div class="field">
    <label class="label" for="title">Article Author:<br></label>
    <input type="text" name="author" class="input" placeholder="Author" value="{{$news->author}}"><br>
  </div>
  <div class="field">
    <label class="label" for="title">Website Link:<br></label>
    <input type="text" name="link" class="input" placeholder="Website link" value="{{$news->link}}"><br>
  </div>
  <div class="field">
    <label class="label" for="description">Description:<br></label>
    <textarea name="meta_description" class="textarea" >{{$news->meta_description}}</textarea> <br><br>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update News</button>
    </div>
  </div>
  
</form>
<form method="POST" action="/news/{{ $news->id}}">
  @method('DELETE')
  @csrf
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-danger">Delete News</button>
    </div>
  </div>
</form>
</div>
@endsection