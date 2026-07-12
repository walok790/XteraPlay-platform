<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('landing_navs', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('url'); // relative or absolute
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->boolean('open_new_tab')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('landing_navs'); }
};
