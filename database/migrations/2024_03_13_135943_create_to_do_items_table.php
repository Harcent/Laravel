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
        Schema::create('to_do_items', function (Blueprint $table) {
            $table->id();
            $table->to_do_id();
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['P', 'C']);
            $table->timestamps();

            $table->foreign('to_do_id')
                ->references('id')
                ->on('to_dos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do_items');
    }
};
