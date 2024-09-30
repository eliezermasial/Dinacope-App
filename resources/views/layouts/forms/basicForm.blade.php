@extends('master')

{{-- Vérifie si la route actuelle est "dinacope.ecole.edit" ou "dinacope.ecole.create" --}}
@if (Route::currentRouteName() === 'dinacope.ecole.edit' || Route::currentRouteName() === 'dinacope.ecole.create')
@section('title', $ecole->exists ? 'Modifier les informations sur l\'école '.$ecole->nom_ecole : "Créer une école")
@section('content')
<!-- partial form -->
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@yield('title')</h4>

            <form class="forms-sample" method="POST" action="{{ route($ecole->exists ? 'dinacope.ecole.update' : 'dinacope.ecole.store', ['ecole'=>$ecole]) }}">
              @csrf
              @method($ecole->exists ? 'PUT' : 'POST')

              @include('shared.input', ['class'=>'form-control', 'name'=>'nom_ecole', 'label'=>'Nom de l\'école', 'value'=>$ecole->nom_ecole])
              @include('shared.input', ['class'=>'form-control', 'name'=>'adresse', 'label'=>'Adresse', 'value'=>$ecole->adresse])
              @include('shared.input', ['class'=>'form-control', 'name'=>'phone', 'label'=>'Téléphone', 'value'=>$ecole->phone])

              <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

{{-- Sinon, vérifie si la route actuelle est "dinacope.ecole.eleve.index" --}}
@elseif (Route::currentRouteName() === 'dinacope.ecole.eleve.create' || 'dinacope.ecole.eleve.edit')

@section('title', $eleve->exists ? 'modifier les informations sur eleve'.' '.$eleve->nom : 'ajouter un eleve')
@section('title','eleve' /*$ecole->exists ? 'Ajouter un élève à l\'école '.$ecole->nom_ecole : "Ajouter un élève"*/)
@section('content')
<!-- partial form -->
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@yield('title')</h4>

            <form class="forms-sample" method="POST" action="{{ route($eleve->exists ? 'dinacope.ecole.eleve.update' : 'dinacope.ecole.eleve.store', ['ecole'=>$ecole, 'eleve'=>$eleve ]) }}">
              @csrf
              @method($eleve->exists ? 'PUT' : 'POST')

              @include('shared.input', ['class'=>'form-control', 'name'=>'nom', 'label'=>'Nom', 'value'=>$eleve->nom])
              @include('shared.input', ['class'=>'form-control', 'name'=>'prenom', 'label'=>'prenom', 'value'=>$eleve->prenom])
              @include('shared.input', ['class'=>'form-control', 'name'=>'classe', 'label'=>'class', 'value'=>$eleve->classe])
              @include('shared.input', ['class'=>'form-control', 'type'=>'date', 'name'=>'date_naissance', 'label'=>'date naissance', 'value'=>$eleve->date_naissance])

              <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@endif

