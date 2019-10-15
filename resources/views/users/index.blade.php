@extends('layouts.appAdmin')

@section('content')
<div class="col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading"><b>Users</b>

    </div>
    <div class="panel-body">
      <a class="pull-right btn btn-success" href="/users/create">Create New User</a><br><br>
      
      <form method="post" action="/searchUser">
        {{ csrf_field() }}
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search By Name/ID"><span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>

      <h1><b>List Of All Users</b></h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($usersList as $user)

          <tr>
            <th scope="row">{{ $user->id}}</th>
            <td><a href="/users/{{ $user->id }}"><b>{{ $user->name}}</b></a></td>
            <td><b>{{ $user->email}}</b></td>
          </tr>

          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection