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

}
