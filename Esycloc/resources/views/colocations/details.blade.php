<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Colocation</title>

    <!-- Bootstrap (optionnel mais recommandé) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex ">
    <div class="col-1">@include('sidebare')</div>
    
    
        <div class="container mt-5 col-6">
            <div class="card shadow rounded-4">
                <div class="card-body">

                    <h2 class="text-primary">
                        {{ $colocation->name }}
                    </h2>

                    <p class="mt-3">
                        {{ $colocation->description }}
                    </p>

                    <p>
                        <strong>Créée le :</strong>
                        {{ $colocation->created_at->format('d/m/Y') }}
                    </p>
                    
                    <a href="/colocation" class="btn btn-secondary mt-3">
                        Retour
                    </a>

                </div>
            </div>
        </div>
        <div class="col-3 mt-5">
             <div class="card shadow rounded-4 border-0">

        <!-- Header -->
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">
                        <h5 class="mb-0">Catégories</h5>

                        <!-- Bouton Ajouter -->
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addCategorieModal">
                            + Ajouter
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="card-body">

                        <!-- Catégorie 1 -->
                        @forelse($colocation->categories as $categorie)
                            <div class="d-flex justify-content-between align-items-center mb-3 p-2 border rounded">
                                <span>{{$categorie->name}}</span>

                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-warning">
                                       <a href="{{route ('categorie.edit', $categorie)}}">Modifier</a> 
                                    </button>
                                    <button class="btn btn-outline-danger">Supprimer</button>
                                </div>
                            </div>
                            @empty
                            <div><p>Acune categories crree pour le moment</p></div>
                         @endforelse
                        
                    </div>
        </div> 
        
            <div class="modal fade" id="addCategorieModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title w-100 text-center">Ajouter Colocation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <form action="{{ route('categorie.store', $colocation->id)}}" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" required>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-success w-50">
                              Ajouter
                          </button>
                      </div>

                  </form>
                </div>

              </div>
            </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>