@extends('master')
@section('title', 'Categories')
@section('content')
    <div class="panel panel-primary">
    	  <div class="panel-heading">
    			<h3 class="panel-title">Categories</h3>
    	  </div>
    	  <div class="panel-body">
    			<div class="table-responsive">
    				<table class="table table-hover">
    					<thead>
    						<tr>
    							<th>#</th>
    							<th>Name</th>
    							<th>Status</th>
                                <th>Action</th>

    						</tr>
    					</thead>
    					<tbody>
                        <a class="btn btn-primary" href="{{ route('category.create') }}">Create</a>
    					<?php $i = 1; ?>
    					@foreach ($cates as $cate)
    						<tr>
    							<td>{{ $i }}</td>
    							<td>{{ $cate->name }}</td>
    							<td>{{ $cate->active }}</td>
                                <td><a class="label label-primary" href="{{ route('category.edit',$cate->id) }}">Edit</a></td>
    						</tr>
    						<?php $i++ ?>
    					@endforeach
    					</tbody>
    				</table>
    			</div>
    	  </div>
    </div>
@endsection