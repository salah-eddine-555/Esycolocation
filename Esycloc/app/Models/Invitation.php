<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Colocation;
class Invitation extends Model
{
    protected $fillable = ['email', 'token','id_user', 'id_colocation'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function colocation(){
        return $this->belongsTo(Colocation::class, 'id_colocation');
    }
}
