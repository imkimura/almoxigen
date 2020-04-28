<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'qty'
    ];
}
