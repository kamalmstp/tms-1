<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'expenses';
    protected $fillable = [
        'expense_category_id',
        'zone_id',
        'main_sector_id',
        'sub_sector_id',
        'expense_resone',
        'ammounts',
    ];
    public function expenseCategory(){
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }
    public function policeMain(){
        return $this->belongsTo(PolicePaymentMain::class,'main_sector_id');
    }
    public function policeSub(){
        return $this->belongsTo(PolicePaymentSub::class,'sub_sector_id');
    }
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id');
    }
}
