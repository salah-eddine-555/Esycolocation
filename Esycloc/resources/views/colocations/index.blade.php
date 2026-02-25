<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>liste des colocations</h2>

  

    @forelse($colocations as $colocation)
    <ul>
        <li>{$colocation->name}</li>
        <li>{$colocation->description}</li>
    </ul>
    @empty  
        <p>aucune colocation exist dans ce moment</p>
        
    @endforelse
</body>
</html>