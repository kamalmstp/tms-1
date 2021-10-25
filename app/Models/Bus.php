<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'buses';
    protected $fillable = [
        'bus_code',
        'status',
    ];
}
