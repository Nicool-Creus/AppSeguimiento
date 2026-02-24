<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{
    use HasFactory;
    protected $table = 'tblprogramasdeformacion';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}
