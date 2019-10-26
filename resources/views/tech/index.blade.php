@extends('layouts.appAdmin')

@section('content')

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
  <div class="panel panel-primary">
    <div class="panel-heading"><b>Tech Information</b>

    </div>
    <div class="panel-body">
      <a class="pull-right btn btn-success" href="/tech/create">Add New Tech</a><br><br>

      <form method="post" action="/searchTech">
        {{ csrf_field() }}
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search By Tech Type/ID/Barcode"><span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>


      <h1><b>Available Tech</b></h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Barcode_Number</th>
            <th scope="col">Tech_Type</th>
            <th scope="col">Loaned</th>
          </tr>
        </thead>
        <tbody id="allTech">
          @foreach($technologies as $tech)

          <tr>
            <th><b>{{ $tech->id}}</b></th>
            <td scope="row"><a href="/tech/{{ $tech->id }}">{{ $tech->code}}</a></td>
            <td><b>{{ $tech->tech_type}}</b></td>
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