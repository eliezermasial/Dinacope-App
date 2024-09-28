@extends('master')
@section('title', $ecole->exists ? 'modifier les informtaions sur ecole'.' '.$ecole->nom_ecole : "creer un ecole")
@section('content')
<!-- partial form -->
<div class="main-panel">        
<div class="content-wrapper">
    <div class="row">
    <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
        <div class="card-body" >
            <h4 class="card-title">@yield('title')</h4>

            <form class="forms-sample" method="POST" action="{{ route($ecole->exists ? 'dinacope.ecole.update' : 'dinacope.ecole.store', ['ecole'=>$ecole])}}">
                @csrf
                @method($ecole->exists ? 'PUT' : 'POST')

            @include('shared.input', ['class'=>'form-control', 'name'=>'nom_ecole', 'label'=>'nom_ecole', 'value'=>$ecole->nom_ecole])
            @include('shared.input', ['class'=>'form-control', 'name'=>'adresse', 'label'=>'adresse', 'value'=>$ecole->adresse])
            @include('shared.input', ['class'=>'form-control', 'name'=>'phone', 'label'=>'phone_', 'value'=>$ecole->phone])

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            
            </form>
        </div>
        <!--
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
        -->
        </div>
    </div>
    </div>
</div>

@include('partials.footer')

@endsection