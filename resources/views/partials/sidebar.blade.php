<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="{{url('images/faces/tamba.jpg')}}" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  Kenneth Osborne
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            <div class="nav-search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                <div class="input-group-append">
                  <span class="input-group-text" id="search">
                    <i class="typcn typcn-zoom"></i>
                  </span>
                </div>
              </div>
            </div>
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" @if (Route::currentRouteName()==='dinacope.ecole.index')
                href="{{ route('dinacope.ecole.index')}}"
              @else
                href="{{ route('dinacope.ecole.index')}}"
            @endif>
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard <span class="badg badge-primary ml-3">New</span></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title"> Forms </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='dinacope.ecole.create') 
                    href="{{ route('dinacope.ecole.create')}}"
                    
                  @elseif (Route::currentRouteName()==='dinacope.ecole.eleve.create' || Route::currentRouteName()==='dinacope.agent.create')
                    
                    @if (Route::currentRouteName()==='dinacope.ecole.eleve.create')
                      href="{{ route('dinacope.ecole.eleve.create', ['ecole'=> $ecole->id])}}"
                    @endif
                      href="{{ route('dinacope.agent.create')}}"
                  @else href="#" @endif> Form Creation </a>
                </li>
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='dinacope.ecole.edit') 
                  href="{{route('dinacope.ecole.edit', ['ecole'=>$ecole->id])}}"

                  @elseif (Route::currentRouteName()==='dinacope.ecole.edit')

                    {{route('dinacope.ecole.edit', ['ecole'=>$ecole->id])}}
                  @else href="#" @endif> Form Edit </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title"> Tables </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='dinacope.ecole.show') 
                  href="{{ route('dinacope.ecole.show', ['ecole' => $ecole->id]) }}" @else href="#" @endif> table ecole </a>
                </li>
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='dinacope.ecole.eleve.index') 
                  href="{{ route('dinacope.ecole.eleve.index', ['ecole' => $ecole->id]) }}" @else href="#" @endif> table eleve </a>
                </li>
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='dinacope.agent.index') 
                  href="{{ route('dinacope.agent.index') }}" @else href="#" @endif> table chefs d'antenne </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">User connexion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName() === 'Auth.login')
                  href="{{route('Auth.login')}}"
                @else
                  href="#"
                @endif> Login </a></li>
                <li class="nav-item"> <a class="nav-link" @if (Route::currentRouteName()==='Auth.login.createCompte')
                  href="{{route('Auth.login.createCompte')}}"
                @else
                  href="#"
                @endif> Créer un compte </a></li>
              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
      </ul>
    </nav>