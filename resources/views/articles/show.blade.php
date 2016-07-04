@extends('master')
@section('title', $article->title)
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create New Article</h3>
        </div>
        <div class="panel-body" style="margin:10px;">
            <h3>{{ $article->title }}</h3>
            <a href="#">By: {{ $article->user->name }}</a> <br>
            <a href="{{ url('/',$article->category->name) }}">Category: {{ $article->category->name }}</a>
            <p>{{ $article->body }}</p>
        </div>
    </div>    
@endsection