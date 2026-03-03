<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { 
            background-color: #f4f7f6; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }

        #content {
            margin-top: 20px;
            width: calc(100% - 250px);
            margin-left: 250px;
        }

        .stat-card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .stat-card:hover { 
            transform: translateY(-5px); 
        }

        table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
<div class="d-flex">

    <!-- SIDEBAR -->
    @include('sidebare')

    <!-- CONTENT -->
    <div id="content" class="container-fluid">

        <h3 class="fw-bold mb-4">Vue d'ensemble - Admin</h3>

        <!-- STATISTIQUES -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card stat-card bg-white shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-primary bg-opacity-10 rounded-circle me-3">
                            <i class="bi bi-people text-primary fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Total Membres</p>
                            <h4 class="fw-bold mb-0">{{ $totalMembres }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card bg-white shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-success bg-opacity-10 rounded-circle me-3">
                            <i class="bi bi-house-check text-success fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Colocations</p>
                            <h4 class="fw-bold mb-0">{{ $totalColocations }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card bg-white shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-danger bg-opacity-10 rounded-circle me-3">
                            <i class="bi bi-wallet2 text-danger fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Dépenses Globales</p>
                            <h4 class="fw-bold mb-0">{{ $totalDepenses }} DH</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- TABLEAU USERS -->
        <hr class="my-5">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="fw-bold mb-4">Liste des Membres</h5>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="border-bottom">
                            <tr class="text-muted">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Reputation</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-bottom">
                                    <td>{{ $user->firstname}}</td>
                                    <td>{{ $user->lastname}}</td>
                                    <td>{{ $user->address}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $user->reputation}}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary">
                                            Dépanner
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Aucun membre trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>