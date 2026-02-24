<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionales extends Model
{
    use HasFactory;
    protected $table = 'tblregionales';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}
