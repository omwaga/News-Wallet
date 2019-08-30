@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card-body">
        <h1 class="title">Edit Category</h1>
        <form method="POST" action="/categories/{{ $category->id}}" style="margin-bottom: 1em;">
            @method('PATCH')
            @csrf
            
            <div class="field">
                <label class="label" for="title">Category Title:<br></label>
                <input type="text" name="title" class="input" placeholder="Category Title" value="{{$category->title}}"><br>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Update Category</button>
                </div>
            </div>
        </form>
        <form method="POST" action="/categories/{{ $category->id}}">
            @method('DELETE')
            @csrf
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-danger">Delete Category</button>
                </div>
            </div>
        </form>
        
    </div>
    
</div>
@endsection