@extends('navbar')

@section('content1')
<!-- 
    Page for user to edit personal information
 -->
<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>

    <div class="">
        <form method="post" action="{{ route('editPersonalInformation.update', [$user->id]) }}">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="user_fullName"><b>Full Name</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Full Name"
                    id="name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $user-> name}}"
                />
            </div>

            <div class="form-group">
                <label for="user_email"><b>Email</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter new email"
                    id="user_email"
                    required
                    name="email"
                    spellcheck="true"
                    class="form-control"
                    value="{{ $user-> email}}"
                />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <a class="btn btn-success" href="{{ URL::previous() }}" role="button">Back</a>
            </div>

            <div class="form-group">
                <p><b>Please note that once information is approved you should sign out for conformation.</b></p>
            </div>

        </form>
    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>


@endsection