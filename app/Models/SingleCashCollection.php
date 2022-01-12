<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleCashCollection extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'single_cash_collection';
    protected $fillable = [
        'collection_point_id',
        'ammount_id',
        'trip_id',
        'date',
        'bus_id'
    ];

    public function buses(){
        return $this->belongsTo(Bus::class,'bus_id');
    }
    public function ammount(){
        return $this->belongsTo(Ammount::class,'ammount_id');
    }
    public function trip(){
        return $this->belongsTo(Trip::class,'trip_id');
    }
    public function collectionpoint(){
        return $this->belongsTo(CollectionPoint::class,'collection_point_id');
    }
}
