@extends('layouts.app')

@section('content')

<nav class="navbar navbar-default" style="background-color: lightblue;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Tech Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}">Dashboard</a>
            <li><a href="{{route('userTech.index')}}">View All Tech</a></li>
            <li><a href="#">Available Tech</a></li>
            <li><a href="#">Personal Information</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content1')
</div>
@endsection