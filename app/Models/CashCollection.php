<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashCollection extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'cash_collections';
    protected $fillable = [
        'collection_point_id',
        'ammount_id',
        'trip_id',
        'date',
        'bus_id'
    ];
    // protected $casts = [
    //     'date' => 'datetime:d/m/Y',
    // ];
    public function bus(){
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
