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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // Unique invoice number
            $table->text('items'); // Items/services description
            $table->decimal('total', 10, 2); // Total amount with precision for currency
            $table->date('due_date'); // Due date for the invoice
            $table->enum('status', ['unpaid', 'paid', 'overdue']); // Invoice status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
