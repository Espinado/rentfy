<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('seller_company_legal_country');
            $table->string('seller_company_legal_city');
            $table->string('seller_company_legal_street');
            $table->string('seller_company_legal_house');
            $table->string('seller_company_legal_room');
            $table->string('seller_company_legal_postcode');
            $table->string('seller_company_phys_country');
            $table->string('seller_company_phys_city');
            $table->string('seller_company_phys_street');
            $table->string('seller_company_phys_house');
            $table->string('seller_company_phys_room');
            $table->string('seller_company_phys_postcode');
            $table->string('seller_company_logo')->nullable();
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
        Schema::dropIfExists('seller_company_profiles');
    }
}
