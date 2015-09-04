<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseSupplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_supplements', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 45);
            $table->decimal('amount', 7, 2);
            $table->tinyInteger('commissionable');
            $table->integer('expense_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expense_supplements');
    }
}
