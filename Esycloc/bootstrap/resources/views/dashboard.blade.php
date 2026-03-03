<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
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
    </style>
</head>

<body>
<div class="d-flex">

    <!-- SIDEBAR -->
    @include('sidebare')

    <!-- CONTENT -->
    <div id="content" class="container-fluid">

        <h3 class="fw-bold mb-4">Mon Dashboard</h3>

        <!-- CARDS STATISTIQUES EN HAUT -->
        <div class="row g-4 mb-5">

            <div class="col-md-6">
                <div class="card stat-card bg-white shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-danger bg-opacity-10 rounded-circle me-3">
                            <i class="bi bi-wallet2 text-danger fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Total Dépenses</p>
                            <h4 class="fw-bold mb-0">{{$totalDepenses}} DH</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card stat-card bg-white shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-warning bg-opacity-10 rounded-circle me-3">
                            <i class="bi bi-star-fill text-warning fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Score Réputation</p>
                            <h4 class="fw-bold mb-0">{{$scoreReputation}}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- TABLEAU DEPENSES EN DESSOUS -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Mes Dépenses</h5>

                <table class="table table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Montant</th>
                            <th>categorie</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($depenses as $depense)
                            <tr>
                                <td>{{$depense->titre}}</td>
                                <td>{{$depense->montant}}</td>
                                <td>{{$depense->categorie->name}}</td>
                                <td>{{$depense->created_at}}</td>
                            </tr>
                        @empty
                            <td colspan=3>acune depenses</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</body>
</html>