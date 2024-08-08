
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @if(Auth::user()->role == "admin")
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('create.user')}}" aria-expanded="false">
                            <i class="mdi mdi-account-plus"></i><span class="hide-menu">Ajouter un utilisateur</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.students')}}" aria-expanded="false">
                            <i class="mdi mdi-school"></i><span class="hide-menu">Étudiants</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('create.student')}}" aria-expanded="false">
                            <i class="mdi mdi-account-plus"></i><span class="hide-menu">Ajouter un étudiant</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role == "accountant")
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('accountant.dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role == "supervisor")
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('supervisor.dashboard')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                @endif
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}" aria-expanded="false">
                        <i class="mdi mdi-logout"></i><span class="hide-menu">Déconnexion</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
