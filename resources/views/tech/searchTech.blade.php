@extends('layouts.appAdmin')

@section('content')

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <!-- <a class="pull-right btn btn-success" href="/tech/create">Add New Tech</a><br><br> -->

            <h1>
                <h1>
                    @if($q == "ok")
                    {{$q}}
                    @endif
                </h1>
            </h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Barcode_Number</th>
                        <th scope="col">Tech_Type</th>
                    </tr>
                </thead>
                <tbody id="allTech">
                    @foreach($technologies as $tech)
                    
                    @if($tech->tech_type == $q)
                    <tr>
                        <th scope="row"><a href="/tech/{{ $tech->id }}">{{ $tech->code}}</a></th>
                        <td><b>{{ $tech->tech_type}}</b></td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection