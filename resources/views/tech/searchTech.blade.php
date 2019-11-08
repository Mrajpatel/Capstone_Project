@extends('layouts.appAdmin')

@section('content')
<!-- 
    This page is controlled by admin to search the specific tech from the database
    Specific routes are used to display information / connections
    Routes information in @web.blade.php
 -->
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <a class="pull-right btn btn-success" href="/tech/create">Add New Tech</a><br><br>

            <h2>
                Results for: "{{$q}}"
            </h2>
            <p><a class="btn btn-success" href="{{ route('tech.index') }}" role="button">Clear Filter</a></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Barcode_Number</th>
                        <th scope="col">Tech_Type</th>
                    </tr>
                </thead>
                <tbody id="allTech">
                    <?php
                    $count  = 0;
                    foreach ($technologies as $tech) {
                        if ($tech->tech_type == $q or $tech->id == $q or $tech->code == $q) {
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
                    </tr>
                    @endforeach

                    @else
                    @foreach($technologies as $tech)
                    @if($tech->tech_type == $q or $tech->id == $q or $tech->code == $q)

                    <tr>
                        <th><b>{{ $tech->id}}</b></th>
                        <td scope="row"><a href="/tech/{{ $tech->id }}">{{ $tech->code}}</a></td>
                        <td><b>{{ $tech->tech_type}}</b></td>
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