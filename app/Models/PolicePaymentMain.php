<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicePaymentMain extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'police_payment_mains';
    protected $fillable = [
        'expense_category_id',
        'sector_name',
    ];
    public function expenseCategory(){
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }
}
