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
        Schema::create('sales_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId("prodid")->constrained("products");
            $table->foreignId('sales_id')->constrained("salesbills")->onDelete('cascade');
            $table->string("descripe",50)->nullable();
            $table->double("quantity",15, 4);
            $table->double("descont",15, 4)->default(0);
            $table->double("totel",15, 3)->nullable();
            $table->string("created_by",30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_items');
    }
};
