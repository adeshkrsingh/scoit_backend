@extends('layouts.app')

@section('content')


<div class="panel-heading">Edit the Class</div>

<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ URL('classmgmt') }}/{{$id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        

        <div class="form-group{{ $errors->has('class_section') ? ' has-error' : '' }}">
            <label for="class_section" class="col-md-4 control-label">Class Section</label>

            <div class="col-md-6">
                <input id="class_section" type="text" class="form-control" name="class_section" value="{{ $classmgmt->class_section }}"  autofocus>

                @if ($errors->has('class_section'))
                    <span class="help-block">
                        <strong>{{ $errors->first('class_section') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ $classmgmt->description }}"  autofocus>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Update the Data
                </button>
            </div>
        </div>
        
    </form>
</div>

@endsection
