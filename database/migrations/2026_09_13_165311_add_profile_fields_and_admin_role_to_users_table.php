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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('password');
            $table->string('profile_photo')->nullable()->after('is_admin');
            $table->text('bio')->nullable()->after('profile_photo');
            $table->string('instagram_url')->nullable()->after('bio');
            $table->string('whatsapp_url')->nullable()->after('instagram_url');
            $table->string('linkedin_url')->nullable()->after('whatsapp_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'is_admin',
                'profile_photo',
                'bio',
                'instagram_url',
                'whatsapp_url',
                'linkedin_url',
            ]);
        });
    }
};
