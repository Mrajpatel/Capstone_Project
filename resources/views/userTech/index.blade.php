@extends('navbar')

@section('content1')
<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <h1><b>Available Tech</b></h1>
            <form method="post" action="/selectTechUser">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Search By ID"><span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
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
                    @foreach($technologies as $tech)

                    <tr>
                        <td><b>{{ $tech->id}}</b></td>
                        <th scope="row">{{ $tech->code}}</a></th>
                        <td><b>{{ $tech->tech_type}}</b></td>
                        <td><b>{{ $tech->condition}}</b></td>
                        <td><b>{{ $tech->description}}</b></td>

                        @if($tech->loaned != true)
                        <td>
                            <b>
                                <form method="post" action="/selectTechUser">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="{{$tech->id}}" style="display:none;">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Select
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </b>
                        </td>
                        @else
                        <td>
                            <b>
                                <form method="post" action="/selectTechUser">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="{{$tech->id}}" style="display:none;">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default btn-sm" disabled>
                                                <b>Loaned-Out</b>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </b>
                        </td>
                        @endif

                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection