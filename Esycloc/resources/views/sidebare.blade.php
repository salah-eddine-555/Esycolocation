<nav id="sidebar">
    <div class="sidebar-header">
        <h4>Esy<span class="text-info">Colocation</span></h4>
    </div>

    <ul class="list-unstyled mt-4">

        <li>
            <a href="/dashboard">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
        </li>
        <li><a href="/colocation"><i class="bi bi-house me-2"></i>Colocations</a></li>
        <li>
            <a href="/profile">
                <i class="bi bi-person-circle me-2"></i>Profil
            </a>
        </li>
       
         
  

        @if(auth()->user()->role->name === 'admin')
        <li>
            <a href="/admin">
                <i class="bi bi-shield-lock me-2"></i>Admin
            </a>
        </li>
        @endif

        <li class="mt-5">
            <a href="#" class="text-danger">
                <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
            </a>
        </li>

    </ul>
</nav>