<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    use HasFactory;
    protected $table = 'tblrolesadministrativos';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'Descripcion'
    ];
    public $timestamps = false;
}
