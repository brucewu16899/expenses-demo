<?php

Route::resource('expenses', 'ExpensesController');

Route::get('/', function () {
    return redirect()->route('expenses.index');
});
