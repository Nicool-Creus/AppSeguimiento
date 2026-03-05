<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacoras extends Model
{
    use HasFactory;
    protected $table = 'tblbitacoras';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'NIS', 'Archivo', 'Estado', 'create_at', 'update_at', 'tblusuarios_NIS'
    ];

    public function usuarios()
    {
        return $this->belongsTo(usuarios::class,'tblusuarios_NIS','NIS');
    }
}
