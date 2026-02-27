<?php

namespace App\Models;
use App\Models\Depense;
use App\Models\Colocation;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['name','colocation_id'];


    public function depenses(){
        return $this->hasMany(Depense::class);
    }

    public function colocation(){
        return $this->belongsTo(Colocation::class);
    }



}
