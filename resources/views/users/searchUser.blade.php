@extends('layouts.appAdmin')

@section('content')
<div class="col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Users</b>

        </div>
        <div class="panel-body">
            <a class="pull-right btn btn-success" href="/users/create">Create New User</a><br><br>

            <h1>Results for: "{{$q}}"</h1>
            <p><a class="btn btn-success" href="/users" role="button">Clear Filter</a></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                    <?php
                    $count  = 0;
                    foreach ($users as $user) {
                        if ($user->name == $q or $user->email == $q) {
                            $count = $count + 1;
                        }
                    }
                    ?>
                    @if($count == 0)
                    <h3>No Results found</h3>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id}}</th>
                        <td><a href="/users/{{ $user->id }}"><b>{{ $user->name}}</b></a></td>
                        <td><b>{{ $user->email}}</b></td>
                    </tr>
                    @endforeach

                    @else

                    @foreach($users as $user)
                    @if($user->name == $q or $user->id == $q)
                    <tr>
                        <th scope="row">{{ $user->id}}</th>
                        <td><a href="/users/{{ $user->id }}"><b>{{ $user->name}}</b></a></td>
                        <td><b>{{ $user->email}}</b></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection