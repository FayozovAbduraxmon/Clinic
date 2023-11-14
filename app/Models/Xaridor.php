<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xaridor extends Model
{
    use HasFactory;

    protected $table = 'Xaridor';

    public $timestamps = false;

    protected $guarded = [];

    function get_xaridor()
    {
        return $this->hasOne(Mashina::class, 'id', 'name');
    }
}
