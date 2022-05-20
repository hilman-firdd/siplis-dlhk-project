<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class PeraturanTerkait extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'peraturan_terkaits';
    protected $guarded = [];

    public function userid(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
