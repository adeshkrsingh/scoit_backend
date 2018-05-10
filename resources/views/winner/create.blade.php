@extends('layouts.app')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


@section('content')
<script src="{{ url('/') }}/js/makeslug.js"></script>


<div class="panel-heading"><h1> Add Winner / Compititor Details  </h1></div>
<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('winner.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label"> Name </label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" style="text-transform: lowercase;" value="{{ old('title') }}" autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('roll_no') ? ' has-error' : '' }}">
            <label for="roll_no" class="col-md-4 control-label"> Roll No </label>

            <div class="col-md-6">
                <input id="roll_no" type="text" class="form-control" name="roll_no" style="text-transform: lowercase;" value="{{ old('roll_no') }}" autofocus>

                @if ($errors->has('roll_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roll_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('event') ? ' has-error' : '' }}">
            <label for="event" class="col-md-4 control-label"> Event Name </label>

            <div class="col-md-6">
                <input id="event" type="text" class="form-control" name="event" style="text-transform: lowercase;" value="{{ old('event') }}" autofocus>

                @if ($errors->has('event'))
                    <span class="help-block">
                        <strong>{{ $errors->first('event') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" class="col-md-4 control-label"> Image Category (to be used for) </label>

            <div class="col-md-6">
                <select  id="status" class="form-control" name="status" >
                    
                         <option value="shortlisted"> shortlisted </option>
                         <option value="completed"> completed </option>
                         <option value="winner"> winner </option>                
                </select>

                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>

       
        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message" class="col-md-4 control-label"> message (optional) </label>

            <div class="col-md-6">
                <input id="message" type="text" class="form-control" name="message" style="text-transform: lowercase;" value="{{ old('message') }}" autofocus>

                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
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
