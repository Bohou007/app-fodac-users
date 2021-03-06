  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header d-flex align-items-center">
              <a class="navbar-brand {{ set_active_route('home') }}" href="{{ route('home') }}">
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
                      @can('voir_dossiers')
                          <li class="nav-item">
                              <a class="nav-link {{ set_active_route('admin.allDossiers') }}"
                                  href="{{ route('admin.allDossiers') }}">
                                  <i class="ni ni-books text-orange"></i>
                                  <span class="nav-link-text">Consulter les dossiers</span>
                              </a>
                          </li>
                      @endcan
                      @can('approuver_dossiers')
                          <li class="nav-item">
                              <a class="nav-link {{ set_active_route('assigned-fond.index') }}"
                                  href="{{ route('assigned-fond.index') }}">
                                  <i class="fa fa-folder-open text-orange"></i>
                                  <span class="nav-link-text">Fond Dossiers</span>
                              </a>
                          </li>
                      @endcan
                      @can('admin')
                          <li class="nav-item">
                              <a class="nav-link {{ set_active_route('compte.users.index') }}"
                                  href="{{ route('compte.users.index') }}">
                                  <i class="ni ni-single-02 text-info"></i>
                                  <span class="nav-link-text">Comptes utilisateurs</span>
                              </a>
                          </li>
                      @endcan
                      @can('voir_roles')
                          <li class="nav-item">
                              <a class="nav-link {{ set_active_route('admin.roles') }}"
                                  href="{{ route('admin.roles') }}">
                                  <i class="ni ni-folder-17 text-info"></i>
                                  <span class="nav-link-text">Gestion des roles</span>
                              </a>
                          </li>
                      @endcan
                      <li class="nav-item">
                          <a class="nav-link {{ set_active_route('notification.index') }}"
                              href="{{ route('notification.index') }}">
                              <i class="ni ni-bell-55 text-pink"></i>
                              <span class="nav-link-text">Notifications</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
