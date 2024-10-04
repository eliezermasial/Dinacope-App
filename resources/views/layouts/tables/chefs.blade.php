@extends('master')
@section('title', 'agent chefs')
@section('content')
<!-- partial -->

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
  
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">@yield('title')</h4>
              @if (session('success'))
                <h4 class="card-title card-description alert alert-success">{{session('success')}}</h4>
              @endif
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead class="table-info">
                    <tr>
                      <th>nom</th>
                      <th>prenom</th>
                      <th>role</th>
                      <th>nom d'antenne</th>
                      <th>contact</th>
                    </tr>
                  </thead>
                  <tbody class="table table-dark">
                    @foreach ($agentchefs as $agentchef)
                    <tr>
                        <td>{{$agentchef->nom}}</td>
                        <td>{{$agentchef->prenom}}</td>
                        <td>{{$agentchef->role}}</td>
                        <td>{{$agentchef->nom_antenne}}</td>
                        <td>{{$agentchef->phone}}</td>
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