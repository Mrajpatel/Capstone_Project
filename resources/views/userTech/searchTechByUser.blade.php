@extends('navbar')

@section('content1')

<!-- 
    This page is controlled by user to search the specific tech from the database using id
    Specific routes are used to display information / connections
    Routes information in @web.blade.php
 -->

<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <h1><b>All Tech Information</b></h1>
            <h2>Results for: "{{$q}}"</h2>
            <p><a class="btn btn-success" href="{{route('userTech.index')}}" role="button">Clear Filter</a></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Barcode_Number</th>
                        <th scope="col">Tech_Type</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count  = 0;
                    foreach ($technologies as $tech) {
                        if ($tech->tech_type == $q or $tech->id == $q or $tech->code == $q or $tech->condition == $q) {
                            $count = $count + 1;
                        }
                    }
                    ?>

                    @if($count == 0)
                    <h3>No Results found</h3>
                    @foreach($technologies as $tech)
                    <tr>
                        <th><b>{{ $tech->id}}</b></th>
                        <td scope="row"><a href="/tech/{{ $tech->id }}">{{ $tech->code}}</a></td>
                        <td><b>{{ $tech->tech_type}}</b></td>
                        <td><b>{{ $tech->condition}}</b></td>
                        <td><b>{{ $tech->description}}</b></td>
                    </tr>
                    @endforeach

                    @else
                    @foreach($technologies as $tech)
                    @if($tech->tech_type == $q or $tech->id == $q or $tech->code == $q or $tech->condition == $q)

                    <tr>
                        <th><b>{{ $tech->id}}</b></th>
                        <td scope="row">{{ $tech->code}}</td>
                        <td><b>{{ $tech->tech_type}}</b></td>
                        <td><b>{{ $tech->condition}}</b></td>
                        <td><b>{{ $tech->description}}</b></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection