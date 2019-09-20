@extends('navbar')

@section('content1')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <h1><b>All Tech Information</b></h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Barcode_Number</th>
                        <th scope="col">Tech_Type</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $tech)

                    <tr>
                        <th scope="row">{{ $tech->code}}</a></th>
                        <td><b>{{ $tech->tech_type}}</b></td>
                        <td><b>{{ $tech->condition}}</b></td>
                        <td><b>{{ $tech->description}}</b></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection