<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'cpf',
        'material_id',
        'health_unit_id',
    ];

    public function healthUnit()
    {
        return $this->hasOne('App\HealthUnit');
    }

    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
