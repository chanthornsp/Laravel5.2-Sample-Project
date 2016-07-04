@extends('master')
@section('title', 'Create Article')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create New Article</h3>
        </div>
        <div class="panel-body" style="margin:10px;">
            {!! Form::open(['method' => 'POST', 'route' => 'article.store', 'class' => 'form-horizontal']) !!}

                @include('articles.form', ['type' => 'create'])
            
            {!! Form::close() !!}
        </div>
    </div>    
@endsection