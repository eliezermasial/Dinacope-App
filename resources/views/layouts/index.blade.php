@extends('master')
@section('title', 'Acceuil Dinacope')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row mb-5">
        <div class="col-sm-6">
          <h3 class="mb-0 font-weight-bold">nom antenne</h3>
          @if(session('success'))
            <h4 class="card-title card-description alert alert-success">{{ session('success') }}</h4>
          @endif
        </div>
        
        <div class="col-sm-6">
          <div class="d-flex align-items-center justify-content-md-end">
            <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                  <a class="btn btn-success btn-sm  btn-icon-text text-white border mr-2"
                   href="{{ route('dinacope.ecole.create')}}" aria-haspopup="true" aria-expanded="false">
                       Add ecole
                  </a>
                  
                </div>
            </div>
            <div class="pr-1 mb-3 mr-2 mb-xl-0">
              <a class="btn btn-secondary btn-sm btn-icon-text text-white border" href="#">
                <i class="typcn typcn-arrow-forward-outline mr-2"></i> Add agent
              </a>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
              <a class="btn btn-primary btn-sm btn-icon-text border" href="{{route('dinacope.ecole.chef.index')}}">
                <i class="typcn typcn-info-large-outline mr-2"></i>voir chef
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-dark text-center">
                <thead>
                  <tr>
                    <th>
                      Id ecole
                    </th>
                    <th>
                      nom d'ecole
                    </th>
                    <th>
                      adress d'ecole
                    </th>
                    <th>
                      chef_etablissement
                    </th>
                    <th>
                      phone
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ecoles as $ecole)
                  
                    <tr>
                      <td>{{ $ecole->id }}</td>
                      <td>
                        <a class="nav-link  menu-title text-white "  aria-expanded="false" aria-controls="tables" href="{{ route('dinacope.ecole.show', ['ecole' => $ecole->id]) }}">{{ $ecole->nom_ecole }}</a>
                      </td>
                      <td>
                        {{$ecole->adresse}}
                      </td>
                      <td>
                        {{$ecole->chefBattement->nom_chef}}
                      </td>
                      <td>
                        {{$ecole->phone}}
                      </td>
                    </tr>
                  
                    
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 d-flex grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between">
                <h4 class="card-title mb-3">Sale Analysis Trend</h4>
              </div>
              <div class="mt-2">
                <div class="d-flex justify-content-between">
                  <small>Order Value</small>
                  <small>155.5%</small>
                </div>
                <div class="progress progress-md  mt-2">
                  <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="mt-4">
                <div class="d-flex justify-content-between">
                  <small>Total Products</small>
                  <small>238.2%</small>
                </div>
                <div class="progress progress-md  mt-2">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="mt-4 mb-5">
                <div class="d-flex justify-content-between">
                  <small>Quantity</small>
                  <small>23.30%</small>
                </div>
                <div class="progress progress-md mt-2">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <canvas id="salesTopChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between">
                <h4 class="card-title mb-3">Display agents</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/tamba.jpg" alt="profile image">
                          <div>
                            <div> Antenne</div>
                            <div class="font-weight-bold mt-1">volkswagen</div>
                          </div>
                        </div>
                      </td>
                      <td>
                        nom
                        <div class="font-weight-bold  mt-1">tamba </div>
                      </td>
                      <td>
                        pre nom
                        <div class="font-weight-bold  mt-1">eliezer </div>
                      </td>
                      <td>
                        role
                        <div class="font-weight-bold text-success  mt-1">88% </div>
                      </td>
                      <td>
                        phone
                        <div class="font-weight-bold  mt-1">0820083703</div>
                      </td>
                      <td>
                        <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
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
    <!-- content-wrapper ends -->
    <!-- footer -->
    @include('partials.footer')
    <!-- footer -->
  </div>
  
@endsection