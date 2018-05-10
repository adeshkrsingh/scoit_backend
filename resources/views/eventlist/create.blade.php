@extends('layouts.app')

@section('content')


<div class="panel-heading">Register Events </div>

<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('eventlist.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
            <label for="introduction" class="col-md-4 control-label">introduction</label>

            <div class="col-md-6">
                <input id="introduction" type="text" class="form-control" name="introduction" value="{{ old('introduction') }}"  autofocus>

                @if ($errors->has('introduction'))
                    <span class="help-block">
                        <strong>{{ $errors->first('introduction') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
            <label for="date" class="col-md-4 control-label">date</label>

            <div class="col-md-6">
                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}"  autofocus>

                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('timming') ? ' has-error' : '' }}">
            <label for="timming" class="col-md-4 control-label">timming</label>

            <div class="col-md-6">
                <input id="timming" type="text" class="form-control" name="timming" value="{{ old('timming') }}"  autofocus>

                @if ($errors->has('timming'))
                    <span class="help-block">
                        <strong>{{ $errors->first('timming') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('venue') ? ' has-error' : '' }}">
            <label for="venue" class="col-md-4 control-label">venue</label>

            <div class="col-md-6">
                <input id="venue" type="text" class="form-control" name="venue" value="{{ old('venue') }}"  autofocus>

                @if ($errors->has('venue'))
                    <span class="help-block">
                        <strong>{{ $errors->first('venue') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('problem_statement') ? ' has-error' : '' }}">
            <label for="problem_statement" class="col-md-4 control-label">problem_statement</label>

            <div class="col-md-6">
                <input id="problem_statement" type="text" class="form-control" name="problem_statement" value="{{ old('problem_statement') }}"  autofocus>

                @if ($errors->has('problem_statement'))
                    <span class="help-block">
                        <strong>{{ $errors->first('problem_statement') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('rules') ? ' has-error' : '' }}">
            <label for="rules" class="col-md-4 control-label">rules</label>

            <div class="col-md-6">
                <input id="rules" type="text" class="form-control" name="rules" value="{{ old('rules') }}"  autofocus>

                @if ($errors->has('rules'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rules') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('procedure') ? ' has-error' : '' }}">
            <label for="procedure" class="col-md-4 control-label">procedure</label>

            <div class="col-md-6">
                <input id="procedure" type="text" class="form-control" name="procedure" value="{{ old('procedure') }}"  autofocus>

                @if ($errors->has('procedure'))
                    <span class="help-block">
                        <strong>{{ $errors->first('procedure') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
            <label for="contact" class="col-md-4 control-label">contact</label>

            <div class="col-md-6">
                <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact') }}"  autofocus>

                @if ($errors->has('contact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('contact') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('uploaded_by') ? ' has-error' : '' }}">
            <label for="uploaded_by" class="col-md-4 control-label">uploaded_by</label>

            <div class="col-md-6">
                <input id="uploaded_by" type="text" class="form-control" name="uploaded_by" value="{{ old('uploaded_by') }}"  autofocus>

                @if ($errors->has('uploaded_by'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uploaded_by') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
            <label for="type" class="col-md-4 control-label">Type of Event</label>

            <div class="col-md-6">
                <select  id="type" class="form-control" name="type" >
                    
                    <option value="hostel"> hostel</option>
                    <option value="college"> college</option>
                    
                </select>

                @if ($errors->has('type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
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
