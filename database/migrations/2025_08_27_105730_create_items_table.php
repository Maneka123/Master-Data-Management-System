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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id'); // FK to brands
            $table->unsignedBigInteger('category_id'); // FK to categories

            $table->string('code')->unique(); // Unique item code
            $table->string('name'); // Item name
            $table->string('attachment')->nullable(); // Attachment path or URL
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); // Item status
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
        Schema::dropIfExists('items');
    }
};
