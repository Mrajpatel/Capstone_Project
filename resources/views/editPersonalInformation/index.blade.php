@extends('navbar')

@section('content1')
<!-- 
    Display user personal infomation
 -->
<div class="">
    <h1 style="color:red; font-weight:bold">{{ $user->name }}</h1>
    <p class="lead" style="color:black"><b>ID:</b> {{ $user->id}}</p>
    <p class="lead" style="color:black"><b>Full Name:</b> {{ $user->name}}</p>
    <p class="lead" style="color:black"><b>Email:</b> {{ $user->email}}</p>
    <p class="lead" style="color:black"><b>Fine ($):</b> {{ $user->fine}}</p>
    
    <b><a style="color:white" href="/editPersonalInformation/{{ $user->id }}/edit" class="btn btn-info" role="button">Edit Information</a></b>

</div>



@endsection