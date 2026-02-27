<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>colocations</title>
    <style>
        #content {
            margin-top: 20px;
            width: calc(100% - 250px);
            margin-left: 250px;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        @include('sidebare')

        <div id="content" class="container-fluid">
            <h2 style="color:#3498db">colocations</h2>
            <button class="btn mt-5 btn-primary w-25" data-bs-toggle="modal" data-bs-target="#addColocationModal">
                 Ajouter colocation
            </button>
            @if(session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif
            <div class="d-flex justify-content-center mt-5">

                <div class="col-7 mt-5">
                     @forelse($colocations as $colocation)
                    <div class="col-md-4 mb-3 d-flex">
                        <div class="card h-100 shadow-sm w-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $colocation->name }}</h5>
                                <p class="card-text">{{ $colocation->description }}</p>
                                <a href="{{ route('colocation.show', $colocation)}}" class="btn btn-primary btn-sm mt-auto">
                                    Détails
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Aucune colocation pour le moment
                        </div>
                    </div>
                @endforelse
                {{-- Tableau des dépenses --}}
                    
                </div>
                <div class="col-4">
                    
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <h5>Membre de colocation</h5>
                        </div>
                      <div class="card-body">
                        This is some text within a card body.
                      </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="addColocationModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title w-100 text-center">Ajouter Colocation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <form action="{{ route('colocation.store') }}" method="POST">
                      @csrf

                      <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" required>
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" required></textarea>
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

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>