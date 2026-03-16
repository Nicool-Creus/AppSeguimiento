<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    protected $table = 'tblusuarios';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'NIS', 'CorreoInstitucional', 'Contrasena', 'TokenContrasena', 'tblaprendices_NIS', 'tblrolesadministrativos_NIS'
    ];
    protected $hidden = [
        'Contrasena'
    ];
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
