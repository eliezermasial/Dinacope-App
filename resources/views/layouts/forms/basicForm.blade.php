@extends('master')
@section('title', $eleve->exists ? "modifier un eleve" : "creer un eleve")
@section('content')
<!-- partial form -->
<div class="main-panel">        
<div class="content-wrapper">
    <div class="row">
    <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
        <div class="card-body" >
            <h4 class="card-title">@yield('title')</h4>

            <form class="forms-sample" method="POST" action="{{ route($eleve->exists ? 'dinacope.eleve.update' : 'dinacope.eleve.store', ['eleve'=>$eleve])}}">
                @csrf
                @method($eleve->exists ? 'PUT' : 'POST')

            @include('shared.input', ['class'=>'form-control', 'name'=>'nom', 'label'=>'nome', 'value'=>$eleve->nom])
            @include('shared.input', ['class'=>'form-control', 'name'=>'prenom', 'label'=>'prenom', 'value'=>$eleve->prenom])
            @include('shared.input', ['class'=>'form-control', 'name'=>'classe', 'label'=>'classe', 'value'=>$eleve->classe])
            @include('shared.input', ['class'=>'form-control', 'type'=>'date', 'name'=>'date_naissance', 'label'=>'date_naissance', 'value'=>$eleve->date_naissance])

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