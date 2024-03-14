<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->references('id')->on('brands')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->text('charging_interface')->nullable();
            $table->text('calling_features')->nullable();
            $table->text('battery_capacity')->nullable();
            $table->text('material')->nullable();
            $table->text('charging_time')->nullable();
            $table->text('chipset')->nullable();
            $table->text('memory')->nullable();
            $table->text('os')->nullable();
            $table->text('display')->nullable();
            $table->text('water_resistance')->nullable();
            $table->text('battery_life')->nullable();
            $table->text('other_features')->nullable();


            
            $table->text('warranty')->nullable();
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
