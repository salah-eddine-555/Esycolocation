<?php

namespace App\Models;
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    
    protected $fillable = ['name', 'description','user_id'];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_colocations')
                    ->withPivot('role_colocation', 'jointed_at', 'left_at')
                    ->withTimestamps();
    }
  
}
