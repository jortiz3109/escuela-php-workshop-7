<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('code', 10)->unique();
            $table->string('name', 80);
            $table->mediumText('description');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('quantity');
            $table->timestamp('disabled_at')->nullable();
            $table->timestamps();

            //Indexes
            $table->index('code');
            $table->fulltext(['name', 'description']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
