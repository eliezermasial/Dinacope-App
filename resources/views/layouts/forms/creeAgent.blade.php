@extends('master')
@section('title', $agent->exists ? 'modifier les informations sur eleve'.' '.$agent->nom : 'creer un agent')
@section('content')
<!-- partial form -->
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin p-2 stretch-card" style="background-color: #1b1b2971">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@yield('title')</h4>

            <form class="forms-sample" action="{{route($agent->exist ? dinacope.agent.update : 'dinacope.agent.store')}}" method="POST">
              @csrf
              @method($agent->exists ? 'PUT' : 'POST')

              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'nom','placeholder'=>'Username'])
              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'prenom','placeholder'=>'Userprenom'])
              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'email', 'placeholder'=>'Email'])
              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'phone', 'placeholder'=>'+243.....'])
              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'password', 'placeholder'=>'password'])
              @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'nom_antenne', 'placeholder'=>'nom d\'antenne'])
              <div class="form-group">
                <label for="roleLabel">Role</label>
                <select name="role" id="role" class="form-control">
                  <option value="agent">
                      Agent
                  </option>
                  <option value="chef_antenne">
                      chef d'antenne
                  </option>
              </select>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
