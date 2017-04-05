<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');

            $table->integer('catId')->unsigned();
            $table->foreign('catId')->references('id')->on('categorys');
            $table->string('imageLink')->nullable();
            $table->bigInteger('isbn');
            $table->string('name');
            $table->decimal('price',8,2);
            $table->string('condition');
            $table->text('description');
            $table->text('edition');
            $table->decimal('retailPrice', 8,2);
            $table->string('imagePath')->nullable();
            $table->string('courseInfo')->nullable();
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
        Schema::dropIfExists('listings');
    }
}
