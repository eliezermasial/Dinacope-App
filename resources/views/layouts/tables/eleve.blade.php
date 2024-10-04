@extends('master')
@section('title', /*$eleves->exists ? 'les eleves de '.' '.$ecole->nom_ecole : 'erreur'*/)
@section('content')
<!-- partial -->

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-sm-12 mb-3">
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
                      <th>ecole</th>
                      <th>date_naissance</th>
                      <th>annee_scolaire</th>
                      <th>agent</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table table-dark">
                    @foreach ($eleves as $eleve)

                    <tr>
                      <td>{{$eleve->id}}</td>
                      <td>{{$eleve->nom}}</td>
                      <td>{{$eleve->prenom}}</td>
                      <td>{{$eleve->classe}}</td>
                      <td>{{$eleve->ecole->nom_ecole}}</td>
                      <td>{{$eleve->date_naissance}}</td>
                      <td></td>
                      <td></td>
                      <td>
                        <div class="template-demo">
                          <a href="{{route('dinacope.ecole.eleve.edit', ['ecole'=>$ecole->id, 'eleve'=>$eleve->id])}}"
                              class="btn btn-info btn-sm btn-rounded btn-fw">
                              Edite
                          </a>
                          <form id="deleteForm" onsubmit="confirmDelete()" action="{{route('dinacope.ecole.eleve.destroy', ['ecole'=>$ecole->id, 'eleve'=>$eleve->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-danger btn-sm btn-rounded btn-fw">delete</button>
                          </form>
                          
                        
                        </div>
                      </td>
                    </tr> 
                    @endforeach
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