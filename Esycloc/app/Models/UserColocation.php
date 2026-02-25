<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Model;

class UserColocation extends Pivot
{
    protected $table = 'user_colocations';
     protected $fillable = [
        'user_id',
        'colocation_id',
        'role_colocation',
        'jointed_at',
        'left_at'
    ];
}
