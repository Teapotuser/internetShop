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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('track_number', 50)->nullable()->after('zip_code');
            $table->boolean('is_paid')->default(false)->after('payment_method');
            $table->date('payment_date')->nullable()->after('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('track_number');
            $table->dropColumn('is_paid');
            $table->dropColumn('payment_date');
        });
    }
};
