@extends('layouts.appAdmin')

@section('content')
<!-- 
    This page is accessed by admin.
    ADMIN dashboard
 -->
    <div class="container">
        
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('component.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
