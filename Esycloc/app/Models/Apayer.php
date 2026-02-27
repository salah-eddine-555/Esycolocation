<?php

namespace App\Models;
use App\Models\User;
use App\Models\Depense;

use Illuminate\Database\Eloquent\Model;

class Apayer extends Model
{
    protected $fillable = ['montant', 'user_id', 'depense_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function depense(){
        return $this->belongsTo(Depense::class);
    }
}
