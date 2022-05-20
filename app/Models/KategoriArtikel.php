<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriArtikel extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = 'kategori_artikels';
    protected $primaryKey = 'id';
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];
}
