<?php

namespace App\Models;
use App\Models\Depense;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['name','colocation_id'];


    public function depenses(){
        return $this->hasMany(Depense::class);
    }


}
