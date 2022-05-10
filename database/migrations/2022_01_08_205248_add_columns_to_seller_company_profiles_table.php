<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSellerCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_company_profiles', function (Blueprint $table) {
            $table->bigInteger('seller_company_id')->unsigned();
            $table->foreign('seller_company_id')
                ->references('id')
                ->on('seller_companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_company_profiles', function (Blueprint $table) {
            $table->dropForeign(['seller_company_id']);
            $table->dropColumn('seller_company_id');
        });
    }
}
