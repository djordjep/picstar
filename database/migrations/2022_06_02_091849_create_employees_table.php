<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('superior_id')->nullable();
            $table->string('name');
            $table->string('position');
            $table->timestamp('startDate')->nullable();
            $table->timestamp('endDate')->nullable();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table)
        {
            // TODO: fix SQLSTATE[HY000]: General error: 1215 Cannot add foreign key constraint (SQL: alter table `employees` add constraint `employees_superior_id_foreign` foreign key (`superior_id`) references `employees` (`id`) on delete set null on update no action
            // $table->foreign('superior_id')->references('id')->on('employees')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
