<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('type',100);
            $table->date('date_of_birth');
            $table->float('weigth',5,2);
            $table->float('height',5,2);
            $table->enum('biteyness', ['1', '2', '3', '4', '5']);
            $table->timestamps();

            $table->foreignId("owner_id")
                ->constrained()
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(["owner_id"]);
        });

        Schema::dropIfExists('animals');
    }
}
