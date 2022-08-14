<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suptoken extends Model
{
    use HasFactory;
    protected $table = "suptokens";
    public $timestamps = false;
}
