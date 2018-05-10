@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if(Session('message'))
    <div class="alert alert-info">{{ Session('message') }}</div>
@endif

<h3>Showing Collections of winner / competitors </h3>

<a href="{{ URL::to('winner/create') }}">
    <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;">Upload New</button>
</a>


<div class="panel-body" style="text-transform: capitalize;">

    <table width="100%" class="table table-striped table-bordered table-hover" id="AdvancedTable">

            <thead>
                <tr>


                    <th class="priority"> name </th>
                    <th class="priority"> event </th>
                    
                    <th class="priority"> Status </th>
                    <th class="priority"> message </th>
                    <th class="priority"> uploaded_by </th>
                    <th class="priority"> action </th>
                    <th class="priority"> assign </th>
                    <th class="priority"> assign </th>
                    <th class="priority"> assign </th>
                   
                   
                </tr>
            </thead>
            <tbody>

           
        @foreach ($info as $element)
            
            <tr>

                <td> {{ $element->name }} </td> 
                <td> {{ $element->event }} </td> 
                <td> {{ $element->status }} </td> 
                <td> {{ $element->message }} </td> 
                <td> {{ $element->uploaded_by }} </td> 
                                
                <td>
                    <form method="POST" action="{{ URL('winner') }}/{{$element->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" name="submit" id="{{$element->id}}" value="Delete">
                    </form>

                    </td> 

                    <td>
                    <a href="{{ URL::to('winner-shortlisted') }}/{{$element->id}}">
                        <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;"> Shortlisted </button>
                    </a>


                    </td> 
                    <td>
                    <a href="{{ URL::to('winner-completed') }}/{{$element->id}}">
                        <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;"> Completed </button>
                    </a>

                    </td>  
                    <td>
                    <a href="{{ URL::to('winner-winner') }}/{{$element->id}}">
                        <button type="button" class="btn btn-primary" style="margin: 10px 0px 0px 10px;"> Winner </button>
                    </a>

                    </td>          
            </tr>
            
        @endforeach
       
    </tbody>
    </table>
</div>
          

@endsection

