@extends('layouts.appAdmin')

@section('content')
<div class="col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-2">
  <div class="panel panel-primary">
        <div class="panel-heading"><b>Users</b> 
          
        </div>
        <div class="panel-body">
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
                    <!--<a href="/users/{{ $user->id }}">-->
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