@extends('navbar')

@section('content1')

<!-- 
    This page is controlled by user to show the specific tech from the database
    Specific routes are used to display information 
    Routes information in @web.blade.php
 -->

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>
    <?php $count  = 0; ?>
    @foreach($technologies as $tech)
    @if($tech->id == $q)
    <?php $count = $count + 1; ?>
    <div class="">
        <h1 style="color:red; font-weight:bold">{{ $tech->code }}_{{ $tech->tech_type}} </h1>
        <p class="lead" style="color:black"><b>Description:</b> {{ $tech->description}}</p>
        <p class="lead" style="color:black"><b>Barcode:</b> {{ $tech->code}}</p>
        <p class="lead" style="color:black"><b>Condition:</b> {{ $tech->condition}}</p>
        <p class="lead" style="color:black"><b>Categories:</b> {{ $tech->tech_type}}</p>
        <p><a class="btn btn-info" href="{{route('userTech.index')}}" role="button">Return</a></p>
    </div>
    @endif
    @endforeach

    @if($count != 0)
    <p>
        <form method="post" action="/loanOut">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="{{$q}}" style="display:none;">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success btn-sm">
                        Loan-Out
                    </button>
                </span>
            </div>
        </form>
    </p>
    @else
    <h1>No results found.</h1>
    <p><a class="btn btn-info" href="{{route('userTech.index')}}" role="button">Return</a></p>
    @endif
    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection