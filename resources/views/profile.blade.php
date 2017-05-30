

@extends('layouts.app')


<style type="text/css">
.profile-img{
    max-width:150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }
</style>

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body text-center">
               <img class="profile-img" src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}">
               
               <h1>{{ Auth::user()->username}}</h1>
                <h5>{{ Auth::user()->email}}</h5>
           
                <h1>Hello {{ Auth::user()->username}}, comming soon</h1>
                <h5>{{ Auth::user()->username}}({{Auth::user()->email}})</h5> 
            
               <button class="btn btn-success">OK</button>
                
            
            </div>
        </div>
    </div>
</div>

@endsection


      
    
