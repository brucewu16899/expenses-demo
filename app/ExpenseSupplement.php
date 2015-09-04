<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseSupplement extends Model
{
    protected $table = 'expense_supplements';

    protected $fillable = ['name', 'amount', 'commissionable'];

    public function expense()
    {
        return $this->belongsTo('App\Expense');
    }
}
