<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $fillable = ['description', 'base_amount'];

    public function supplements()
    {
        return $this->hasMany('App\ExpenseSupplement','expense_id');
    }
}
