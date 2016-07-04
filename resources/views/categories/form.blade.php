<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Category') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
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
    {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
</div>