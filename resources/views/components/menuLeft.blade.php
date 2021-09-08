  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header d-flex align-items-center">
              <a class="navbar-brand" {{ set_active_route('home') }}" href="{{ route('home') }}">
                  <img src="{{ asset('images/fodac-logo.png') }}" class="navbar-brand-img" alt="...">
              </a>
              <div class="ml-auto">
                  <!-- Sidenav toggler -->
                  <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                      data-target="#sidenav-main">
                      <div class="sidenav-toggler-inner">
                          <i class="sidenav-toggler-line"></i>
                          <i class="sidenav-toggler-line"></i>
                          <i class="sidenav-toggler-line"></i>
                      </div>
                  </div>
              </div>
          </div>
          <div class="navbar-inner">
              <!-- Collapse -->
              <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                  <!-- Nav items -->
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link {{ set_active_route('home') }}" href="{{ route('home') }}">
                              <i class="fa fa-home icon-active"></i>
                              <span class="nav-link-text">Tableau de bord</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ set_active_route('dossiers.index') }}" href="{{ route('dossiers.index') }}">
                              <i class="ni ni-books text-orange"></i>
                              <span class="nav-link-text">Consulter ses dossiers</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ set_active_route('dossiers.create') }}" href="{{ route('dossiers.create') }}">
                              <i class="ni ni-ui-04 text-info"></i>
                              <span class="nav-link-text">Demande de soutien</span>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ set_active_route('documents-administrative.index') }}" href="{{ route('documents-administrative.index') }}">
                            <i class="ni ni-folder-17 text-info"></i>
                            <span class="nav-link-text">Documents Administratives</span>
                        </a>
                    </li>
                      {{-- <li class="nav-item">
                          <a class="nav-link {{ set_active_route('notification.index') }}" href="{{ route('notification.index') }}">
                              <i class="ni ni-bell-55 text-pink"></i>
                              <span class="nav-link-text">Notifications</span>
                          </a>
                      </li> --}}
                      {{-- <li class="nav-item">
                          <a class="nav-link {{ set_active_route('supports') }}" href="{{ route('supports') }}">
                              <i class="ni ni-support-16 text-default"></i>
                              <span class="nav-link-text">Supports</span>
                          </a>
                      </li> --}}
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                              <span class="nav-link-text">Deconnexion</span>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
  <!-- Main content -->
