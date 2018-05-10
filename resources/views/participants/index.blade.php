@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if(Session('message'))
    <div class="alert alert-info">{{ Session('message') }}</div>
@endif

<h3>Showing participant </h3>

<div class="panel-body" style="text-transform: capitalize;">

    <table width="100%" class="table table-striped table-bordered table-hover" id="AdvancedTable">

            <thead>
                <tr>

                    <th class="priority"> name </th>
                    <th class="priority"> rollno </th>
                    <th class="priority"> mobile </th>
                    <th class="priority"> email </th>
                    <th class="priority"> event_id </th>
                    <th class="priority"> message </th>
                    <th class="priority"> drive_link </th>
                    <th class="priority"> extra1 (event name) </th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>

           
        @foreach ($info as $element)
            
            <tr>
                
                
                

                <td> {{ $element->name }} </td> 
                <td> {{ $element->rollno }} </td> 
                <td> {{ $element->mobile }} </td> 
                <td> {{ $element->email }} </td> 
                <td> {{ $element->event_id }} </td> 
                <td> {{ $element->message }} </td> 
                <td> {{ $element->drive_link }} </td> 
                <td> {{ $element->extra1 }} </td> 
                                
                    <td>
                    <form method="POST" action="{{ URL('participants') }}/{{$element->id}}">
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

