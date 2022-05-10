<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSellerCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_companies', function (Blueprint $table) {
            $table->string('seller_admin_name');
            $table->string('seller_admin_surname');
            $table->string('seller_admin_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_companies', function (Blueprint $table) {
           $table->dropColumn('seller_admin_name');
           $table->dropColumn('seller_admin_surname');
           $table->dropColumn('seller_admin_email');
        });
    }
}
