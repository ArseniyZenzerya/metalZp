<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('title', 191);
            $table->string('slug');
            $table->text('description');
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('id_categories');
            $table->foreign('id_categories')->references('id')->on('categories')->onDelete('cascade');
//images foreign add
            $table->index('views');
            $table->index('title');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
