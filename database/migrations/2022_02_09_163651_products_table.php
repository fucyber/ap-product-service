<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

        $table->increments('id');
        $table->string('prd_no', 10)->unique();
        $table->string('image', 150)->nullable();
        $table->enum('published', ['Y', 'N'])->default('Y');
        $table->string('name', 150);
        $table->string('short_description', 250)->nullable();
        $table->text('detail')->nullable();
        $table->double('price', 8, 2);
        $table->double('discount_price', 8, 2)->nullable();
        $table->timestamps();
        $table->softDeletes();

        //--Index
        $table->index('prd_no');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('products');
    }
}
