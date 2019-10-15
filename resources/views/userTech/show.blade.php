@extends('navbar')

@section('content1')

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>

    <div class="">
        {{$technologies}}
    </div>

    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection