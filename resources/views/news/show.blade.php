@extends('layouts.master')
@section('content')
<div class="container">
<h1 class="title">{{$news->title}}</h1>

	<div class="field">
	<label>Featured Image:</label>
	<img src="{{$news->image}}" alt="{{$news->title}}" alt="Girl in a jacket" style="width:150px;height:160px;">
	</div>
	<div class="field">
	<label>Article Author:</label>
	{{$news->author}}
	</div>
	<div class="field">
	<label>Website Name:</label>
	{{$news->website}}
	</div>
	<div class="field">
	<label>Website Link:</label>
	{{$news->link}}
	</div>
	<div class="field">
	<label>News Meta Description:</label>
	{{$news->meta_description}}
	</div>
	<div class="field">
	<label>Total artical views:</label>
	{{$news->meta_description}}
	</div>
	<button class="button is-success" onclick="window.location.href = '/news/{{$news->id}}/edit';">Edit Article</button>
	
	</p>
</div>
@endsection