@extends('layouts.appAdmin')

@section('content')

<!-- 
    This page is controlled by admin to add new user in the database
    Specific routes are used to display information 
    Routes information in @web.blade.php
 -->

<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">User Information</h3>
    </div>

    <div class="">
        <form method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}


            <div class="form-group">
                <label for="user_name"><b>User Full-Name</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Full Name"
                    id="user_name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <label for="user_email"><b>User Email</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter User Email"
                    id="user_email"
                    required
                    name="email"
                    spellcheck="false"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <label for="user_password"><b>User Password</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter User Password"
                    id="user_password"
                    name="password"
                    spellcheck="true"
                    required
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <label for="user_fine"><b>User Fine</b><span></span></label>
                <input type="number"
                    placeholder="Enter User Fine"
                    id="user_fine"
                    name="fine"
                    spellcheck="true"
                    class="form-control"
                />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <a class="btn btn-success" href="/users" role="button">View All Users</a>
            </div>

        </form>
    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>

@endsection