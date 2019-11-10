@extends('layouts.appAdmin')

@section('content')

<!-- 
    This page is controlled by admin to show the specific tech from the database
    Specific routes are used to display information 
    Routes information in @web.blade.php
 -->

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>

    <div class="">
        <h1 style="color:red; font-weight:bold">{{ $technologies->code }}_{{ $technologies->tech_type}} </h1>
        <p class="lead" style="color:black"><b>Description:</b> {{ $technologies->description}}</p>
        <p class="lead" style="color:black"><b>Barcode:</b> {{ $technologies->code}}</p>
        <p class="lead" style="color:black"><b>Condition:</b> {{ $technologies->condition}}</p>
        <p class="lead" style="color:black"><b>Categories:</b> {{ $technologies->tech_type}}</p>
        <p><a class="btn btn-success" href="/tech" role="button">View All Tech</a></p>
        
        <b><a style="color:white" href="/tech/{{ $technologies->id }}/edit" class="btn btn-info" role="button">Edit</a></b>
        
    
        </b>
            <a 
              class="btn btn-danger"     
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Tech Data?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('tech.destroy',[$technologies->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

        </b>

        </b><a style="color:black" href="#" class="btn btn-default" role="button">Add New Tech</a></b>
    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>
@endsection