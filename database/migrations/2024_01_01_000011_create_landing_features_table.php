<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('landing_features', function (Blueprint $table) {
            $table->id();
            $table->string('section')->default('features'); // features, services, benefits
            $table->string('title');
            $table->text('description');
            $table->string('icon_svg')->nullable();
            $table->string('icon_color')->default('blue'); // blue, emerald, amber, violet, pink, orange, teal
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('landing_features'); }
};
