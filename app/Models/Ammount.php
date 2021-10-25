<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ammount extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'ammounts';
    protected $fillable = [
        'collection_point_id',
        'ammounts',
        'status',
    ];
    public function collection(){
        return $this->belongsTo(CollectionPoint::class,'collection_point_id');
    }
}
