<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdocumentos extends Model
{
    use HasFactory;
    protected $table = 'tbltiposdocumentos';

    protected $primaryKey = 'NIS';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;

    public function aprendices()
    {
        return $this->hasMany(
            Aprendices::class,
            'tbltiposdocumentos_NIS', // FK en tblaprendices
            'NIS'                     // PK local
        );
    }
}
