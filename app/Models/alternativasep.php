<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativasep extends Model
{
    protected $table = 'tblalternativasep';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'TipoAlternativa'
    ];

    public $timestamps = false;

    public function subtipos()
    {
        return $this->hasMany(subtipoalternativa::class, 'tblalternativasep.NIS', 'NIS');
    }
}
