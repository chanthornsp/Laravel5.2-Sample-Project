@extends('master')
@section('title', 'Create Category')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create Category</h3>
        </div>
        <div class="panel-body" style="margin:10px;">
            {!! Form::open(['method' => 'POST', 'route' => 'category.store', 'class' => 'form-horizontal']) !!}

                 @include('categories.form', ['type' => 'create'])
            	
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection