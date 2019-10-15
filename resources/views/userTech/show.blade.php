@extends('navbar')

@section('content1')

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>
    @foreach($technologies as $tech)
    @if($tech->id == $q)
    <div class="">
        <h1 style="color:red; font-weight:bold">{{ $tech->code }}_{{ $tech->tech_type}} </h1>
        <p class="lead" style="color:black"><b>Description:</b> {{ $tech->description}}</p>
        <p class="lead" style="color:black"><b>Barcode:</b> {{ $tech->code}}</p>
        <p class="lead" style="color:black"><b>condition:</b> {{ $tech->condition}}</p>
        <p class="lead" style="color:black"><b>Type:</b> {{ $tech->tech_type}}</p>
        <p><a class="btn btn-info" href="{{route('userTech.index')}}" role="button">Back</a></p>
    </div>
    @endif
    @endforeach

    <p><a class="btn btn-info" href="/loanOut" role="button" value="{{$tech->id}}">Loan-Out</a></p>
    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection