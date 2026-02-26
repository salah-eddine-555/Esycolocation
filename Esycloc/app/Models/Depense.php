<?php

namespace App\Models;
use App\Models\User;
use App\Models\Categorie;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    //
    protected $fillable = ['titre', 'montant', 'date'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
