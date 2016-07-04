@extends('master')
@section('title','Articles')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Articles</h3>
		</div>
		<div class="panel-body">
		@foreach ($articles as $article)			
					<h4><a href="{{ route('article.show',$article->id) }}"> {{ $article->title }}</a></h4>
				<p>{{ str_limit($article->body,200) }}</p>
				<a href="#">By: {{ $article->user->name }}</a> <br>
				<a href="{{ url('/',str_slug($article->category->name,'-')) }}">Category: {{ $article->category->name }}</a>, 
				@if (Auth::check())
					@if ($article->active != 1)
						<span class="text-danger">Unublish</span>
					@else
						<span class="text-primary">Publish</span>
					@endif
					<a class="text-right label label-info" href=" {{ route('article.edit',$article->id) }} ">Edit</a>
					
				@endif
				<hr>			
			
		@endforeach
		<div class="text-center">
			{{-- Generate Pagination Links --}}
			{{ $articles->links() }}
		</div>			
		</div>
	</div>
	
@endsection