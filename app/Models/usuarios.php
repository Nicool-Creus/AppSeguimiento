<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $table = 'tblusuarios';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'NIS', 'CorreoInstitucional', 'Contrasena'
    ];
    protected $hidden = [
        'Contrasena'
    ];

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
