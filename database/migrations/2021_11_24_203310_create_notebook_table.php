<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebook', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable(false);
            $table->string('company')->nullable(true);
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
            $table->date('birth')->nullable(true);
            $table->string('image')->default(url()->current() . '/uploads/default_notebook_image.png');
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
        Schema::dropIfExists('notebook');
    }
}
