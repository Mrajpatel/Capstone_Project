@extends('layouts.app')

@section('content')


<div class="container">


    <div class="masthead">
        <h3 class="text-muted" style="color:black; font-weight:bold">Tech Information</h3>
    </div>

    <div class="">
        <form method="post" action="{{ route('tech.store') }}">
            {{ csrf_field() }}


            <div class="form-group">
                <label for="tech_code"><b>BarCode</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Barcode"
                    id="tech_code"
                    required
                    name="barcode"
                    spellcheck="false"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <label for="tech_description"><b>Description</b></label>
                <textarea 
                    placeholder="Enter Description"
                    id="tech_description"
                    style="resize: vertical"
                    rows="5"
                    name="description"
                    spellcheck="false"
                    class="form-control autosize-target text-left">
                </textarea>
            </div>

            <div class="form-group">
                <label for="tech_condition"><b>Condition</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Tech Condition"
                    id="tech_condition"
                    required
                    name="condition"
                    spellcheck="true"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <label for="tech_type"><b>Tech-Type</b><span class="required">*</span></label>
                <input 
                    placeholder="Enter Tech Type"
                    id="tech_type"
                    required
                    name="techType"
                    spellcheck="true"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <a class="btn btn-success" href="/tech" role="button">View All Tech</a>
            </div>

        </form>
    </div>



    <footer class="footer">
        <p>© 2019 Tech-Manager, Inc.</p>
    </footer>
</div>







@endsection