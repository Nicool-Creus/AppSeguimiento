<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformador extends Model
{
    use HasFactory;
    protected $table = 'tblentecoformador';

    protected $fillable = [
        'NIS', 'TipoDoc', 'NumDoc', 'RazonSocial', 'Direccion', 'Telefono', 'CorreoInstitucional'
    ];
    public $timestamps = false;
}
