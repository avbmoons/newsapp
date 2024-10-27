<?php

declare (strict_types=1);

use App\Enums\SectionStatus;
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
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('resume', 255)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_visible');
            $table->enum('status', SectionStatus::all())->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
