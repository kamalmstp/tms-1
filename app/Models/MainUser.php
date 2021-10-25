<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainUser extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'main_users';
    protected $fillable = [
        'user_type_id',
        'user_name',
        'phone',
        'image',
        'status',
    ];
    public function userType(){
        return $this->belongsTo(UserType::class,'user_type_id');
    }
}
