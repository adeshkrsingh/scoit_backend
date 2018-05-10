@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
            </div>
        </div>


        <div class="col-md-8" style="margin-top: 25px">
            <div class="card">
                <div class="card-header">Management</div>

                <div class="card-body">
                    
                    <a href="eventlist"> Event Management </a> <br>
                    <a href="participants"> Participants Management </a>  <br>
                    <a href="gallery"> Gallery Management </a>  <br>
                    <a href="members"> members Management </a>  <br>
                    <a href="winner"> winner Management </a>  <br>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
