<?php

use App\Models\Customer;
use App\Models\Importer;
use App\Models\Invoice;
use App\Models\DInvoice;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('serial');
            $table->string('problem');
            $table->date('sale_date');
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(Importer::class);
            $table->foreignIdFor(Invoice::class);
            $table->foreignIdFor(DInvoice::class)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
