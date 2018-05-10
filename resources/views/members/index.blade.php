@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if(Session('message'))
    <div class="alert alert-info">{{ Session('message') }}</div>
@endif

<h3>Showing Collections of Images </h3>

<a href="{{ URL::to('members/create') }}">
    <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;">Upload New Image</button>
</a>


<div class="panel-body" style="text-transform: capitalize;">

    <table width="100%" class="table table-striped table-bordered table-hover" id="AdvancedTable">

            <thead>
                <tr>
                    
                    <th class="priority"> Image </th>
                    <th class="priority"> Image Address (Identity) </th>
                    
                    <th class="priority"> Name </th>
                    <th class="priority"> Roll no </th>
                    <th class="priority"> Year </th>
                    <th class="priority"> Member Type </th>
                    <th class="priority"> Extra1 </th>
                    <th class="priority"> Fb link </th>
                    <th class="priority"> Linkedin Link </th>
                    <th class="priority"> Uploaded By </th>
                   
                    <th>  </th>
                   
                </tr>
            </thead>
            <tbody>

           
        @foreach ($info as $element)
            
            <tr>
                
                
                <td><img src="{{ $element->photo }}" style="width: 70px; height: 70px;"> </td>
                <td style="text-transform: none;"> {{ $element->photo }} </td>

                <td> {{ $element->name }} </td> 
                <td> {{ $element->roll_no }} </td> 
                <td> {{ $element->year }} </td> 
                <td> {{ $element->member_type }} </td> 
                <td> {{ $element->extra1 }} </td> 
                <td> {{ $element->facebook_link }} </td> 
                <td> {{ $element->linkedin_link }} </td> 
                <td> {{ $element->uploaded_by }} </td> 
                                
                    <td>
                    <form method="POST" action="{{ URL('members') }}/{{$element->id}}">
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

