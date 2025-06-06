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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('label');
            $table->foreignUuid('admin_menu_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->string('route_name')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_by')->default(0);
            $table->string('role')->default('admin');
            $table->longText('params')->nullable();
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
        // Schema::dropIfExists('admin_menus');
    }
};
