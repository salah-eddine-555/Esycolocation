<?php

namespace App\Models;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Apayer;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    //
    protected $fillable = ['titre', 'montant', 'date','categorie_id','user_id','colocation_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function colocation(){
        return $this->belongsTo(Colocation::class);
    }

    public function apayees(){
        return $this->hasMany(Apayer::class, 'depense_id');
    }
}
