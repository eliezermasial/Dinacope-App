@extends('master')
@section('title', $eleve->exists ? 'infos sur eleve'.' '.$eleve->nom : 'infos sur ecole')
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
                <a class="btn btn-success btn-sm  btn-icon-text text-white border mr-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="typcn typcn-calendar-outline mr-2"></i> Add eleve
                </a>
              </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-12 grid-margin stretch-card mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">infos sur ecole : nom d'ecole by ID</h4>
            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead class="table-info">
                  <tr>
                    <th>Id</th>
                    <th>nombre de class</th>
                    <th>nombre de professeur</th>
                    <th>chef d'etablissement</th>
                    <th>nombre d'eleve par année</th>
                    <th>phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>                       
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-pane">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">list des eleves </h4>
              @if (session('success'))
                <h4 class="card-title card-description alert alert-success">{{session('success')}}</h4>
              @endif
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead class="table-info">
                    <tr>
                      <th>Id</th>
                      <th>nom</th>
                      <th>prenom</th>
                      <th>class</th>
                      <th>date_naissance</th>
                      <th>annee_scolaire</th>
                      <th>agent</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table table-dark">
                    <tr>
                      <td>{{$eleve->id}}</td>
                      <td>{{ $eleve->nom }}</td>
                      <td>{{ $eleve->prenom }}</td>
                      <td>{{ $eleve->classe}}</td>
                      <td>{{ $eleve->date_naissance}}</td>
                      <td></td>
                      <td></td>
                      <td>
                        <div class="template-demo">
                          <a href="{{route('dinacope.eleve.edit', ['eleve'=>$eleve->id])}}"
                              class="btn btn-info btn-sm btn-rounded btn-fw">
                              Edite
                          </a>
    
                            <form action="{{route('dinacope.eleve.destroy', $eleve)}}" method="POST">
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