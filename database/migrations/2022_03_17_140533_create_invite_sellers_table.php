<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inviter_id');
            $table->bigInteger('invitee_company_id')->unsigned();
            $table->bigInteger('invitee_user_id')->unsigned();
            $table->string('token');
            $table->string('email');
            $table->timestamp('claimed')->nullable();
            $table->timestamps();
            $table->foreign('invitee_company_id')
                 ->references('id')
                 ->on('seller_companies')
                 ->onDelete('cascade');
            $table->foreign('invitee_user_id')
                 ->references('id')
                 ->on('seller_company_users')
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
        Schema::dropIfExists('invite_sellers');
    }
}
