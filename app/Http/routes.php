<?php

Route::resource('expenses', 'ExpensesController');

Route::get('/', function () {
    return 'Nothing here mate, move along';
});
