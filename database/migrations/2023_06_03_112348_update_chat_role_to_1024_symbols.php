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
            Schema::table('chats', function (Blueprint $table) {
                $table->string('role', 1024)->nullable()->default(env('defaultSystemRole'))->change();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('chats', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
    };
