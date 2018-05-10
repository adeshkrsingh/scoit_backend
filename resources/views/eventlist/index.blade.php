@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if(Session('message'))
    <div class="alert alert-info">{{ Session('message') }}</div>
@endif

<h3>Showing the List of Registered Events </h3>

<a href="{{ URL::to('eventlist/create') }}">
    <button type="button" class="btn btn-primary"  style="margin: 10px 0px 0px 10px;">Add New Event</button>
</a>

<div class="panel-body">

    <table width="100%" class="table table-striped table-bordered table-hover" id="AdvancedTable">

            <thead>
                <tr>
                    <th class="priority"> ID </th>
                    <th class="priority"> title </th>
                    <th class="priority"> introduction </th>
                    <th class="priority"> date </th>
                    <th class="priority"> timming </th>
                    <th class="priority"> venue </th>
                    <th class="priority"> problem_statement </th>
                    <th class="priority"> rules </th>
                    <th class="priority"> procedure </th>
                    <th class="priority"> contact </th>
                    <th class="priority"> uploaded_by </th>
                    <th class="priority"> type </th>
                    <th class="priority"> image </th>
                    <th>  </th>
                    <th>  </th>
                </tr>
            </thead>
            <tbody>

           
        @foreach ($eventlist as $element)
            
            <tr>
                <td> {{ $element->id }} </td> 
                <td> {{ $element->title }} </td> 
                <td> {{ $element->introduction }} </td> 
                <td> {{ $element->date }} </td> 
                <td> {{ $element->timming }} </td> 
                <td> {{ $element->venue }} </td> 
                <td> {{ $element->problem_statement }} </td> 
                <td> {{ $element->rules }} </td> 
                <td> {{ $element->procedure }} </td> 
                <td> {{ $element->contact }} </td> 
                <td> {{ $element->uploaded_by }} </td> 
                <td> {{ $element->type }} </td> 
                <td> {{ $element->image }} </td> 
                <td> 
                    <a href="{{ URL::to('eventlist/' . $element->id . '/edit') }}">
                   
                    <input type="button" class="btn btn-info  btn-sm" name="EDIT" id="" value="EDIT">
                    </a>  &nbsp; 
                
                </td>
                <td>
                <form method="POST" action="{{ URL('eventlist') }}/{{$element->id}}">
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

