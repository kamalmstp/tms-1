<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicePaymentSub extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'police_payment_subs';
    protected $fillable = [
        'main_sector_id',
        'sub_sector_name',
        'phone',
    ];
    public function policmain(){
        return $this->belongsTo(PolicePaymentMain::class,'main_sector_id');
    }
}
