<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mashina extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Mashina';

    public $timestamps = false;

    protected $guarded = [];

    function get_xaridor()
    {
        return $this->hasOne(Xaridor::class, 'id', 'name');
    }
}
