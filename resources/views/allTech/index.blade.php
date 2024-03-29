@extends('navbar')

@section('content1')
<!-- 
    This page extends the navbar for the userview and displays information of all available tech in the database
 -->
<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Tech Information</b>

        </div>
        <div class="panel-body">
            <h1><b>Tech Information</b></h1>
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
                        <th scope="col">Available</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $tech)

                    <tr>
                        <td><b>{{ $tech->id}}</b></td>
                        <td scope="row">{{ $tech->code}}</a></td>
                        <td>{{ $tech->tech_type}}</td>
                        <td>{{ $tech->condition}}</td>
                        <td>
                            <?php
                                $tech_loan = $tech->loaned;
                                $flag = "False";
                                if ($tech_loan == 1) {
                                    $flag = "True";
                                }
                            ?>
                            <b>{{ $flag }}</b>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection