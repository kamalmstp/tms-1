<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'collection_points';
    protected $fillable = [
        'collection_point_name',
        'status',
    ];
}
