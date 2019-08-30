@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card-body">
    <h1 class="title">Add Category</h1>
    <form method="POST" action="/categories">
      {{@csrf_field()}}
      <div class="field">
        Category Name:<br>
        <input type="text" name="title" class="input" placeholder="News Category" required="" value="{{old('title')}}"><br>
      </div>
      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Add Category</button>
        </div>
      </div>
    </form>
    @include('errors')
  </div>
</div>
@endsection