@extends('layouts.appAdmin')

@section('content')

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">User Information</h3>
    </div>

    <div class="">
        <h1 style="color:red; font-weight:bold">{{ $singleUserData->name }} </h1>
        <p class="lead" style="color:black"><b>ID:</b> {{ $singleUserData->id}}</p>
        <p class="lead" style="color:black"><b>Email:</b> {{ $singleUserData->email}}</p>
        <p class="lead" style="color:black"><b>Fine: </b> $ {{ $singleUserData->fine}}</p>
        <p class="lead" style="color:black"><b>Account Created At:</b> {{ $singleUserData->created_at}}</p>
        <p><a class="btn btn-success" href="/users" role="button">View All Users</a></p>
        
        <b><a style="color:white" href="/users/{{ $singleUserData->id }}/edit" class="btn btn-info" role="button">Edit Data</a></b>

        </b>
            <a 
              class="btn btn-danger"     
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this User?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('users.destroy',[$singleUserData->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

        </b>

    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>

@endsection