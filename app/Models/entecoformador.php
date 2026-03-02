<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformador extends Model
{
    use HasFactory;
    protected $table = 'tblentecoformadores';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'tbltiposdocumentos_NIS', 'NumDoc', 'RazonSocial', 'Direccion', 'Telefono', 'CorreoInstitucional'
    ];
    public $timestamps = false;
    public function tiposdocumentos()
    {
        return $this->belongsTo(tiposdocumentos::class,'tbltiposdocumentos_NIS','NIS');
    }
}
