<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativasep extends Model
{
    protected $table = 'tblalternativasep';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'Archivo', 'Estado', 'created_at', 'updated_at', 'tblusuarios_NIS'
    ];

    public function usuarios()
    {
        return $this->belongsTo(usuarios::class,'tblusuarios_NIS','NIS');
    }
}
