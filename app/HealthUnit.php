<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthUnit extends Model
{
    protected $table = 'health_units';

    public $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
