<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Modifier categorie</title>
</head>
<body>
    <div class="d-flex">
        <div class="col-2">
        @include('sidebare')
        </div>
        
        
        <div class="col-8 mt-5">
            
            <form action="{{ route('categorie.update', $categorie)}}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" value="{{$categorie->name}}" class="form-control" required>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-success w-25">
                              modifier
                          </button>
                          <button class="btn btn-info w-25">retour</button>
                      </div>

            </form>
        </div>
    </div>
    

   
</body>
</html>