<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('subcategory_id')->nullable();
        $table->unsignedBigInteger('childcategory_id')->nullable();
        $table->decimal('price', 10, 2);
        $table->decimal('mrp', 10, 2)->nullable();
        $table->string('thumbnail');
        $table->json('images');
        $table->integer('stock');
        $table->boolean('status')->default(1); // 1 = Active, 0 = Deactive
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        $table->foreign('childcategory_id')->references('id')->on('childcategories')->onDelete('cascade');
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
};
