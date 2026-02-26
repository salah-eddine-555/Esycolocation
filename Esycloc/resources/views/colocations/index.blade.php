<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>colocations</title>
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

                <div class="col-7">
                    <table class="table w-75">
                        <tr>
                            <th>name</th>
                            <th>description</th>
                        </tr>
                        @forelse($colocations as $colocation)
                        <tr>
                            <td>{{ $colocation->name }}</td>
                            <td>{{ $colocation->description }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Aucune colocation pour le moment</td>
                        </tr>
                        @endforelse
                </table>
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