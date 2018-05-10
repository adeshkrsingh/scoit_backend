@extends('layouts.app')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


@section('content')
<script src="{{ url('/') }}/js/makeslug.js"></script>


<div class="panel-heading"><h1> Upload on Gallery </h1></div>
    
<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label"> title of Image </label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" style="text-transform: lowercase;" value="{{ old('title') }}" autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
            <label for="images" class="col-md-4 control-label"> Select Image / Images </label>

            <div class="col-md-6">

                <input type="file" name="images[]" multiple />

                @if ($errors->has('images'))
                    <span class="help-block">
                        <strong>{{ $errors->first('images') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
            <label for="type" class="col-md-4 control-label"> Image Category (to be used for) </label>

            <div class="col-md-6">
                <select  id="type" class="form-control" name="type" >
                    
                         <option value="pages"> Pages </option>
                         <option value="gallery"> Gallery </option>                    
                </select>

                @if ($errors->has('type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('drive_link') ? ' has-error' : '' }}">
            <label for="drive_link" class="col-md-4 control-label"> drive_link of Image </label>

            <div class="col-md-6">
                <input id="drive_link" type="text" class="form-control" name="drive_link" style="text-transform: lowercase;" value="{{ old('drive_link') }}" autofocus>

                @if ($errors->has('drive_link'))
                    <span class="help-block">
                        <strong>{{ $errors->first('drive_link') }}</strong>
                    </span>
                @endif
            </div>
        </div> 

        

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>

    </form>
</div>


@endsection
