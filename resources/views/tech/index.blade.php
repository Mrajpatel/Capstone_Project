@extends('layouts.appAdmin')

@section('content')

<script>
  $("ul").click(function() {
    alert("The paragraph was clicked.");
  });
</script>

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
  <div class="panel panel-primary">
    <div class="panel-heading"><b>Tech Information</b>

    </div>
    <div class="panel-body">
      <a class="pull-right btn btn-success" href="/tech/create">Add New Tech</a><br><br>

      <form method="post" action="/searchTech">
        {{ csrf_field() }}
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search By ID"><span class="input-group-btn">
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
            <th scope="col">Barcode_Number</th>
            <th scope="col">Tech_Type</th>
          </tr>
        </thead>
        <tbody id="allTech">
          @foreach($technologies as $tech)

          <tr>
            <th scope="row"><a href="/tech/{{ $tech->id }}">{{ $tech->code}}</a></th>
            <td><b>{{ $tech->tech_type}}</b></td>
          </tr>

          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection