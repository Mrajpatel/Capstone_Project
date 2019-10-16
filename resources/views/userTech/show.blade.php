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
    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection