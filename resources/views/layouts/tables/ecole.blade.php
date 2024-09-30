@extends('master')
@section('title', $ecole->exists ? 'infos sur ecole'.' '.$ecole->nom_ecole : 'infos sur ecole')
@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">nom ecole</h3>
      </div>
      <div class="col-sm-6">
        <div class="d-flex align-items-center justify-content-md-end">
          <div class="mb-3 mb-xl-0 pr-1">
            <div class="dropdown">
              <a class="btn btn-success btn-sm  btn-icon-text text-white border mr-2"
               href="{{ route('dinacope.ecole.eleve.create', ['ecole'=> $ecole->id])}}" aria-haspopup="true" aria-expanded="false">
                   Add eleve
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-12 grid-margin stretch-card mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">infos sur ecole : {{$ecole->nom_ecole}}</h4>
            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead class="table-info">
                  <tr>
                    <th>Id</th>
                    <th>Nom  d'ecole</th>
                    <th>Adress d'ecole</th>
                    <th>Chef d'etablissement</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$ecole->id}}</td>
                    <td>{{$ecole->nom_ecole}}</td>
                    <td>{{$ecole->adresse}}</td>
                    <td></td>
                    <td>{{$ecole->phone}}</td>
                    <td>
                      <div class="template-demo">
                        <a href="{{route('dinacope.ecole.edit', ['ecole'=>$ecole->id])}}"
                            class="btn btn-info btn-sm btn-rounded btn-fw">
                            Edite
                        </a>
                        <a href="{{ route('dinacope.ecole.eleve.index', ['ecole' => $ecole->id]) }}"
                          class="btn btn-info btn-sm btn-rounded btn-fw">
                          voir les eleves
                      </a>
  
                          <form action="{{route('dinacope.ecole.destroy', $ecole)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm btn-rounded btn-fw">delete</button>
                          </form>
                      </div>
                    </td>
                  </tr>                       
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('partials.footer')

@endsection