@extends('master')
@section('title', 'Edit Category')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body" style="margin:10px;">
            {!! Form::model($cate, ['route' => ['category.update', $cate->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            
                @include('categories.form', ['type' => 'edit'])            
            	
            
            {!! Form::close() !!}



             <a class="btn btn-danger" data-toggle="modal" href='#modal-id'>Delete</a>
            <div class="modal fade" id="modal-id">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Message Box!</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you want to delete this category? </p>
                  </div>
                  <div class="modal-footer">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy',$cate->id], 'class' => 'form-horizontal']) !!}
                    
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    
                    {!! Form::close() !!}
                    
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
@endsection