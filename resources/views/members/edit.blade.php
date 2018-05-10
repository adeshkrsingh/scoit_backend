@extends('admin.pagelayout.master')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
@section('content')

<div class="panel-heading">Register</div>

<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ URL('admin-publicpages') }}/{{$id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">


        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label"> Page Title (different for each page)</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" style="text-transform: lowercase;" value="{{ $pagedata->title }}" autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            <label for="slug" class="col-md-4 control-label"> Page Address (do not change this)</label>

            <div class="col-md-6">

                <input id="slug" type="text" class="form-control" name="slug" style="text-transform: lowercase;" value="{{ $pagedata->slug }}" data-slug-origin="title" autofocus>

                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
            <label for="excerpt" class="col-md-4 control-label">Short Description (One line)</label>

            <div class="col-md-6">
                <input id="excerpt" type="text" class="form-control" name="excerpt" value="{{ $pagedata->excerpt }}" autofocus>

                @if ($errors->has('excerpt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('excerpt') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for="image" class="col-md-4 control-label"> Image Address (eg- upcestnit.org/aab/xyz.jpg)</label>

            <div class="col-md-6">
                <input id="image" type="text" class="form-control" name="image" style="text-transform: lowercase;" value="{{ $pagedata->image }}" autofocus>

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label"> content to display </label>

            <div class="col-md-6">
                {{-- <input id="content" type="text" class="form-control" name="content" value="{{ $institute->content }}"  autofocus> --}}
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    {{ $pagedata->body }}
                </textarea>

                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>

         <script>
                CKEDITOR.replace( 'editor1' );
            </script>



        <div class="form-group{{ $errors->has('page_category') ? ' has-error' : '' }}">
            <label for="page_category" class="col-md-4 control-label"> Page Category </label>

            <div class="col-md-6">
                <select  id="page_category" class="form-control" name="page_category" >
                    <option value="{{ $pagedata->page_category }}" selected>
                                    {{ $pagedata->page_category }}
                    </option>

                    @foreach ($pagecategory as $element) 
                         <option value="{{$element}}"> {{$element}}</option>
                    @endforeach
                </select>

                @if ($errors->has('page_category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('page_category') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            <label for="meta_keywords" class="col-md-4 control-label"> Page Keywords </label>

            <div class="col-md-6">
                <input id="meta_keywords" type="text" class="form-control" name="meta_keywords" value="{{ $pagedata->meta_keywords }}" autofocus>

                @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('page_status') ? ' has-error' : '' }}">
            <label for="page_status" class="col-md-4 control-label"> Page Status </label>

            <div class="col-md-6">
                <select  id="page_status" class="form-control" name="page_status" >
                    
                         <option value="{{ $pagedata->status }}" selected>
                                    {{ $pagedata->status }}
                         </option>

                         <option value="ACTIVE"> ACTIVE </option>
                         <option value="INACTIVE"> INACTIVE </option>
                    
                </select>

                @if ($errors->has('page_status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('page_status') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Update the Page
                </button>
            </div>
        </div>

    </form>
</div>


 <script>
    

        $('document').ready(function () {
          

            
            // $('input[data-slug-origin]').each(function(i, el) {
            //     $(el).slugify();
            // });

                $('#title').keyup(function(){
                     var titleval =document.getElementById('title').value;
                    
                    str = titleval
                    .toString()
                    .toLowerCase();

                    var _slug = '';
                        //_sep = this.settings.separator;

                    // Replace Char Map
                    //

                    for (var i=0, l=str.length ; i<l ; i++)
                    {
                        if( str.charCodeAt(i)>=65  && str.charCodeAt(i)<=90 )
                        {
                            _slug += str.charAt(i);
                        }
                        else if( str.charCodeAt(i)>=97  && str.charCodeAt(i)<=122 )
                        {
                            _slug += str.charAt(i);
                        }
                        else if( str.charCodeAt(i)==32)
                        {
                            _slug += "-";
                        }
                        // _slug += str.charAt(i);
                    }

                    // str = _slug
                    //     .replace(/^\s+|\s+$/g, '')      // Trim
                    //     .replace(/[^-\u0600-Û¾\w\d\$\*\(\)\'\!\_]/g, "-")   // Remove invalid chars
                    //     .replace(/\s+/g, "-")          // Replace spaces with separator
                    //     .replace(/\-\-+/g, "-");


                    document.getElementById("slug").setAttribute('value', _slug );

                });


            

            

               
        });
            
    </script>

@endsection
