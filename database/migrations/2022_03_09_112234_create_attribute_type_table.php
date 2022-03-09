<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable()->constrained('types','id')->onDelete('cascade');
            $table->foreignId('attribute_id')->nullable()->constrained('attributes','id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_type');
    }
}
