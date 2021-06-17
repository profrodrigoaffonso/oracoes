<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasNovena extends Model
{
    use HasFactory;

    protected $fillable = ['novena_id', 'dia'];

}
