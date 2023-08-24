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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();            
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('delivery_method');
            $table->string('payment_method');            
            $table->string('status')->default('New');
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
        Schema::dropIfExists('orders');
    }
};
