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
        $this->down(); // Wymagane.

        // Do zrobienia migracji na users nie używamy php artisan migrate:fresh, ponieważ usunie to wszystkie tabele z bazy.
        // Aby zrobić taką migrację, należy wejść do bazy danych, a następnie w tabeli sessions usunąć rekord związany z
        // create_users_table, a nastepnie wykonać polecenie php artisan migrate.

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->boolean('is_doctor');
            $table->integer('table_id');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
