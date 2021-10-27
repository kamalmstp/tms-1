<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalCash extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'total_cashes';
    protected $fillable = [
        'ds_ammount',
        'saydabad_ammount',
        'gp_ammount',
        'minus_gp_ammount',
        'after_minus_gp_ammount',
        'date'
    ];
}
