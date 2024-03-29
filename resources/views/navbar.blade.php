@extends('layouts.app')

@section('content')
<!-- 
    Nav bar for the user to route through different pages
 -->
<nav class="navbar navbar-default" style="background-color: lightblue;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span> Tech Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}">Dashboard</a>
            <li><a href="{{route('allTech.index')}}">Available Tech</a></li>
            <li><a href="{{route('userTech.index')}}">Loan-Out</a></li>
            <li><a href="{{route('editPersonalInformation.index')}}">User Information</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content1')
</div>
@endsection