@extends('layouts.appAdmin')

@section('content')


<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">User Information</h3>
    </div>

    <div class="">
        <form method="post" action="{{ route('users.update', [$singleUserData->id]) }}">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="tech_code"><b>User Full-Name</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Full Name"
                    id="user_name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $singleUserData -> name}}"
                />
            </div>

            <div class="form-group">
                <label for="tech_condition"><b>User Email</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter User Email"
                    id="user_email"
                    required
                    name="email"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $singleUserData-> email}}"
                />
            </div>

            <div class="form-group">
                <label for="tech_type"><b>User Fine</b><span></span></label>
                <input type="number"
                    placeholder="Enter User Fine"
                    id="user_fine"
                    name="fine"
                    spellcheck="true"
                    class="form-control"
                    value="{{ $singleUserData-> fine}}"
                />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <a class="btn btn-success" href="{{ URL::previous() }}" role="button">Back</a>
                <a class="btn btn-success" href="/users" role="button">View All Users</a>
            </div>

        </form>
    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection