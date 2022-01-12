<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'expense_categories';
    protected $fillable = [
        'expense_category_name',
    ];
}
