@extends('master')
@section('title', 'modifications ou creation')
@section('content')
<!-- partial form -->
<div class="main-panel">        
<div class="content-wrapper">
    <div class="row">
    <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
        <div class="card-body" >
            <h4 class="card-title">@yield('title')</h4>
            <p class="card-description">
            Basic form layout
            </p>
            <form class="forms-sample">
            <div class="form-group">
                <label for="exampleInputUsername1">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

@include('partials.footer')

@endsection