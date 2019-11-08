@extends('layouts.appAdmin')

@section('content')
<!-- 
    This page is controlled by admin to add, edit or remove and search the specific user from the database
    Specific routes are used to display information 
    Routes information in @web.blade.php
 -->
<div class="col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading"><b>Users</b>

    </div>
    <div class="panel-body">
      <a class="pull-right btn btn-success" href="/users/create">Create New User</a><br><br>

      <form method="post" action="/searchUser">
        {{ csrf_field() }}
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search By Name"><span class="input-group-btn">
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
            <th score="col">Loanout Item-ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($usersList as $user)

          <tr>
            <th scope="row">{{ $user->id}}</th>
            <td><a href="/users/{{ $user->id }}"><b>{{ $user->name}}</b></a></td>
            <td><b>{{ $user->email}}</b></td>
            <td>
              <?php
              $tech = "No Tech Loaned-out";
              foreach ($loanoutList as $list) {
                if ($user->id == $list->user_id) {
                  $tech = $list->tech_id;
                }
              }
              ?>
              <b>{{ $tech }}</b>
            </td>
            <td>
              <a style="color:white" href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-info" role="button">
                <span class="glyphicon glyphicon-pencil"></span> Edit
              </a>
            </td>
            <td>
              <a class="btn btn-sm btn-danger" href="#" onclick="
                  var result = confirm('Are you sure you wish to delete this User?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          ">
                <span class="glyphicon glyphicon-remove"></span>
              </a>

              <form id="delete-form" action="{{ route('users.destroy',[$user->id]) }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection