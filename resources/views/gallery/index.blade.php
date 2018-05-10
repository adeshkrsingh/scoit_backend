@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if(Session('message'))
    <div class="alert alert-info">{{ Session('message') }}</div>
@endif

<h3>Showing Collections of Images </h3>

<a href="{{ URL::to('gallery/create') }}">
    <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;">Upload New Image</button>
</a>


<div class="panel-body" style="text-transform: capitalize;">

    <table width="100%" class="table table-striped table-bordered table-hover" id="AdvancedTable">

            <thead>
                <tr>
                    
                    <th class="priority"> Image </th>
                    <th class="priority"> Image Address (Identity) </th>
                    

                    <th class="priority"> Title </th>
                    <th class="priority"> Type </th>
                    <th class="priority"> Drive Link </th>
                    <th class="priority"> Uploaded By </th>
                   
                    <th>  </th>
                   
                </tr>
            </thead>
            <tbody>

           
        @foreach ($image as $element)
            
            <tr>
                
                
                <td><img src="{{ $element->image_url }}" style="width: 70px; height: 70px;"> </td>
                <td style="text-transform: none;"> {{ $element->image_url }} </td>

                <td> {{ $element->title }} </td> 
                <td> {{ $element->type }} </td> 
                <td> {{ $element->drive_link }} </td> 
                <td> {{ $element->uploaded_by }} </td> 
                                
                    <td>
                    <form method="POST" action="{{ URL('gallery') }}/{{$element->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger  btn-sm" name="submit" id="{{$element->id}}" value="Delete">
                    </form>

                    </td>          
            </tr>
            
        @endforeach
       
    </tbody>
    </table>
</div>
          

@endsection

