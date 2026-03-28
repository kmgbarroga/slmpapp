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
            $table->unsignedBigInteger('api_given_id')->unique()->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('street')->nullable();
            $table->string('suite')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_catch_phrase')->nullable();
            $table->string('company_bs')->nullable();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'api_given_id',
                'username',
                'phone',
                'website',
                'street',
                'suite',
                'city',
                'zipcode',
                'lat',
                'lng',
                'company_name',
                'company_catch_phrase',
                'company_bs'
            ]);
            $table->string('password')->nullable(false)->change();
        });
    }
};
