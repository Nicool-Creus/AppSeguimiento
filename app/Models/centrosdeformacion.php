<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $table = 'tblcentrosdeformacion';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Direccion', 'Observaciones', 'tblregionales_NIS'
    ];
    public $timestamps = false;
    public function regionales()
    {
        return $this->belongsTo(regionales::class,'tblregionales_NIS','NIS');
    }

}
