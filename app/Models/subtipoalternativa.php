<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subtipoalternativa extends Model
{
    protected $table = 'tblsubtipoalternativa';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'SubtipoAlternativa', 'tblalternativasep_NIS'
    ];

    public function alternativas()
    {
        return $this->belongsTo(alternativasep::class,'tblalternativasep_NIS','NIS');
    }
}
