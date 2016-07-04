<div class="form-group{{ $errors->has('cate_id') ? ' has-error' : '' }}">
      {!! Form::label('cate_id', 'Category') !!}
      {!! Form::select('cate_id',$categories, (isset($article->cat_id)?$article->cat_id:null), ['id' => 'cate_id', 'class' => 'form-control', 'required' => 'required']) !!}
      <small class="text-danger">{{ $errors->first('cate_id') }}</small>
  </div>

 	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
 	    {!! Form::label('title', 'Title') !!}
 	    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
 	    <small class="text-danger">{{ $errors->first('title') }}</small>
 	</div>
 	<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
 	    {!! Form::label('body', 'Article Body') !!}
 	    {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
 	    <small class="text-danger">{{ $errors->first('body') }}</small>
 	</div>
 	<div class="form-group">
 	    <div class="checkbox{{ $errors->has('active') ? ' has-error' : '' }}">
 	        <label for="active">
 	            {!! Form::checkbox('active', '1', null, ['id' => 'active']) !!} Active
 	        </label>
 	    </div>
 	    <small class="text-danger">{{ $errors->first('active') }}</small>
 	</div>

  <div class="btn-group pull-right">
      {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
  </div>