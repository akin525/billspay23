<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class server extends Model
{
    use HasFactory;

    protected $table = 'servers';
    protected $guarded=[];

}
