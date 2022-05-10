<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_companies', function (Blueprint $table) {
            $table->id();
            $table->string('seller_company_name');
            $table->string('seller_company_legal_status');
            $table->string('seller_company_reg_number');
            $table->string('seller_company_vat_number');
            $table->boolean('tax_payer')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_banned')->default(false);
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
        Schema::dropIfExists('seller_companies');
    }
}
