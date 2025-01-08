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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('request_detail');
            $table->string('requestor');
            $table->string('requestor_dept');
            $table->string('requestor_phone');
            $table->enum('category', ['FourZ', 'Website', 'Helpdesk', 'Service', 'Internet', 'Other', 'Voucher']);
            $table->enum('status', ['on_Request', 'on_Progress', 'Pending', 'Finished'])->default('on_Request');
            $table->enum('urgency', ['Low', 'Medium', 'High']);
            $table->boolean('is_sent');
            $table->date('datetime');
            // $table->enum('dept', ['admin', 'user', 'manager'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
