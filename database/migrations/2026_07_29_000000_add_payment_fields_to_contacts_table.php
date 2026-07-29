<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Mirrors whatever Khalti reports: pending, completed, or failed
            $table->enum('payment_status', ['pending', 'completed', 'failed'])
                ->default('pending')
                ->after('message');

            $table->string('khalti_pidx')->nullable()->after('payment_status');
            $table->string('khalti_transaction_id')->nullable()->after('khalti_pidx');
            $table->unsignedInteger('payment_amount')->nullable()->after('khalti_transaction_id'); // NPR (rupees)
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn([
                'payment_status', 'khalti_pidx', 'khalti_transaction_id', 'payment_amount',
            ]);
        });
    }
};
