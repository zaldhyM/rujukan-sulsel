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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username", 100)->nullable(false)->unique("username");
            $table->string("password", 250)->nullable(false);
            $table->string("nama", 100)->default("")->index("nama");
            $table->string("nik", 20)->nullable(false)->index("nik");
            $table->string("no_hp", 20);
            $table->text("alamat");
            $table->integer("id_faskes")->index("id_faskes");
            $table->string("token", 250)->nullable()->unique("token");
            $table->tinyInteger('status')->default(1)->index("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
