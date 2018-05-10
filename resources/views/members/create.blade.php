@extends('layouts.app')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


@section('content')
<script src="{{ url('/') }}/js/makeslug.js"></script>


<div class="panel-heading"><h1> Add Member Details  </h1></div>
<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
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



        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
            <label for="year" class="col-md-4 control-label"> Image Category (to be used for) </label>

            <div class="col-md-6">
                <select  id="year" class="form-control" name="year" >
                    
                         <option value="1"> 1st </option>
                         <option value="2"> 2nd </option>                    
                         <option value="3"> 3rd </option>                    
                         <option value="4"> final </option>                    
                </select>

                @if ($errors->has('year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>
        </div>

       
        <div class="form-group{{ $errors->has('member_type') ? ' has-error' : '' }}">
            <label for="member_type" class="col-md-4 control-label"> member_type (position) </label>

            <div class="col-md-6">
                <input id="member_type" type="text" class="form-control" name="member_type" style="text-transform: lowercase;" value="{{ old('member_type') }}" autofocus>

                @if ($errors->has('member_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('member_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('extra1') ? ' has-error' : '' }}">
            <label for="extra1" class="col-md-4 control-label"> extra1 (if any) </label>

            <div class="col-md-6">
                <input id="extra1" type="text" class="form-control" name="extra1" style="text-transform: lowercase;" value="{{ old('extra1') }}" autofocus>

                @if ($errors->has('extra1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('extra1') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('fb_link') ? ' has-error' : '' }}">
            <label for="fb_link" class="col-md-4 control-label"> fb_link </label>

            <div class="col-md-6">
                <input id="fb_link" type="text" class="form-control" name="fb_link" style="text-transform: lowercase;" value="{{ old('fb_link') }}" autofocus>

                @if ($errors->has('fb_link'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fb_link') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('linkedin_link') ? ' has-error' : '' }}">
            <label for="linkedin_link" class="col-md-4 control-label"> linkedin_link </label>

            <div class="col-md-6">
                <input id="linkedin_link" type="text" class="form-control" name="linkedin_link" style="text-transform: lowercase;" value="{{ old('linkedin_link') }}" autofocus>

                @if ($errors->has('linkedin_link'))
                    <span class="help-block">
                        <strong>{{ $errors->first('linkedin_link') }}</strong>
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
