<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = "t_pk";

    protected $guarded = [
        't_pk'
    ];

    protected $dates = [
        't_ext'
    ];
}
