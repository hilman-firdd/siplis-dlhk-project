<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileTPK extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'profile_t_p_k_s';
    protected $guarded = [];
    
}
