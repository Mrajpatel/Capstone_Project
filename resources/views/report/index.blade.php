@extends('layouts.appAdmin')

@section('content')

<div class="panel panel-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tech ID</th>
                <th scope="col">Barcode_Number</th>
                <th scope="col">Tech_Type</th>
                <th scope="col">Loaned</th>
                <th scope="col">Loaned Student ID</th>
                <th scope="col">Due-Time</th>
            </tr>
        </thead>
        <tbody id="allTech">
            @foreach($technologies as $tech)
            <tr>
                <th><b>{{ $tech->id}}</b></th>
                <td scope="row">{{ $tech->code}}</a></td>
                <td>{{ $tech->tech_type}}</td>
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
                <td>
                    <?php
                    $user = "Not Loaned-out";
                    foreach ($loanoutList as $list) {
                        if ($tech->id == $list->tech_id) {
                            $user = $list->user_id;
                        }
                    }
                    ?>
                    <b>{{ $user }}</b>
                </td>
                <td>
                    <?php
                    $tech_loan_time = $tech->due_time;
                    $flag = $tech_loan_time;
                    if ($tech_loan_time == "") {
                        $flag = "---";
                    }
                    ?>
                    <b>{{ $flag }}</b>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection('content')