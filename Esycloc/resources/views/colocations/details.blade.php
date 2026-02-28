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
            <div class="col-6">
                     @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
            </div>
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
            {{-- Tableau des dépenses --}}
                    <div class="mt-5">

                        <div class="card border-0 shadow-sm">

                            {{-- Header propre avec bouton --}}
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-semibold text-dark">
                                    Liste des Dépenses
                                </h5>

                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDepenseModal">
                                    + Nouvelle dépense
                                </button>
                            </div>

                            <div class="card-body p-0">

                                <div class="table-responsive">
                                  
                                    <table class="table align-middle mb-0">

                                        <thead class="bg-light">
                                            <tr class="text-muted small">
                                                <th class="ps-4">Titre</th>
                                                <th>Catégorie</th>
                                                <th>Montant</th>
                                                <th>Payeur</th>
                                                <th class="text-end pe-4">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($depenses as $depense)
                                                <tr>
                                                     <td class="ps-4 fw-medium">{{$depense->titre}}</td>
                                                     <td>
                                                    <span class="badge bg-secondary-subtle text-dark">
                                                        {{$depense->categorie->name}}
                                                    </span>
                                                    </td>
                                                     <td class="fw-semibold text-success">{{$depense->montant}} DH</td>
                                                     <td>{{$depense->user->firstname}}</td>
                                                     
                                                     <td>
                                                        <form action="{{route ('depense.destroy', $depense)}}" method="POST">
                                                            @csrf
                                                             @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">supprimer</button>
                                                        </form>
                                                     </td>  
                                            @empty
                                                <td colspan='4'>acune depense</td>
                                            @endforelse
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
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
                                    
                                       <a class="btn btn-outline-warning" href="{{route ('categorie.edit', $categorie)}}">Modifier</a> 
                                   
                                        <form action="{{ route('categorie.destroy', $categorie) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                Supprimer
                                            </button>
                                        </form>
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

    {{-- Modal statique pour ajouter une dépense --}}
<div class="modal fade" id="addDepenseModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center">Ajouter une Dépense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form  action="{{ route('depense.store', $colocation)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="titre"  class="form-control" placeholder="Ex: Loyer Janvier" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catégorie</label>
                        <select name="categorie_id" class="form-select" required>
                            <option value="" disabled selected>Choisir une catégorie</option>
                            @forelse($colocation->categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @empty
                                <option value="" disabled>Aucune catégorie disponible</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Montant</label>
                        <input type="number" name="montant" class="form-control" placeholder="Ex: 2500" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-50">Ajouter</button>
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