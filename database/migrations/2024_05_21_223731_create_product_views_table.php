<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateProductViewsTable extends Migration
    {
        public function up()
        {
            Schema::create('product_views', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->date('date');
                $table->unsignedInteger('views')->default(0);
                $table->timestamps();

                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            });
        }

        public function down()
        {
            Schema::dropIfExists('product_views');
        }
    }
