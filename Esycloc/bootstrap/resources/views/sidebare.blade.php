<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<style>
     #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            background: #2c3e50;
            color: #fff;
            position: fixed;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #1a252f;
            text-align: center;
        }

        #sidebar ul li a {
            padding: 15px 20px;
            display: block;
            color: #bdc3c7;
            text-decoration: none;
            transition: 0.3s;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: #34495e;
            border-left: 4px solid #3498db;
        }
</style>
<body>
    

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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-danger border-0 bg-transparent">
                    <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                </button>
            </form>
        </li>

    </ul>
</nav>
</body>
</html>