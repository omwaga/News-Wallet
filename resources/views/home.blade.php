@extends('layouts.master')

@section('content')
<div class="container">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                <a class="navbar-brand" href="{{ url('/categories') }}">
                      News Categories
                </a>
                </div>
</div>
@endsection
