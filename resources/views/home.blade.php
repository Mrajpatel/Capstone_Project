@extends('navbar')

@section('content1')

<!-- 
    This page is accessed by user
    USER home page
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
                    <?php
                        $count = 0;
                    ?>
                    
                    @foreach($loanoutInfo as $tech)
                    
                    @if($tech->user_id == Auth::id())
                    <?php
                        $count = $count + 1;
                    ?>
                    <b><p class="text-success">Loaned Tech ID: {{$tech->tech_id}}</p>
                    <p class="text-danger">Due Time: {{$tech->due_time}}</p><br></b>
                    @endif
                    
                    @endforeach

                    @if($count == 0)
                        <p>You have not loaned out anything Yet!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
