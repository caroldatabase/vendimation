

<div class="form-body">
    
<div class="form-group {{ $errors->first('name', ' has-error') }}
@if(session('field_errors')) {{ 'has-error' }} @endif
">
        <label class="control-label col-md-3">Tag Name <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::text('name',null, ['class' => 'form-control','data-required'=>1])  !!} 
            <span class="help-block">{{ $errors->first('name', ':message') }} @if(session('field_errors')) {{ 'The Tag name already been taken!' }} @endif </span>
        </div>
    </div> 

    @if(isset($id) && $id > 0)
        <input type="hidden" name='id' value="{{$id}}" id="tag_id">
    @endif
    
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
          {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}


           <a href="{{route('sub-category')}}">
{!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>
</div>
