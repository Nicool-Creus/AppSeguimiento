<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eps extends Model
{
    use HasFactory;
    protected $table = 'tbleps';

    protected $primaryKey = 'NIS';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'NumDoc', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;

    public function aprendices()
    {
        return $this->hasMany(
            Aprendices::class,
            'tbleps_NIS',
            'NIS'
        );
    }
}
