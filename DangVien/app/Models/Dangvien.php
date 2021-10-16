<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dangvien extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
}
