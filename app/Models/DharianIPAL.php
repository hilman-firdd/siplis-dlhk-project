<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class DharianIPAL extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'dharian_i_p_a_l_s';
    protected $guarded = [];
}
