<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->integer('P1');
            $table->integer('P2');
            $table->integer('P1score');
            $table->integer('P1oldrating');
            $table->integer('P1newrating');
            $table->binary('P1win')->default(FALSE);
            $table->integer('P2score');
            $table->integer('P2oldrating');
            $table->integer('P2newrating');
            $table->binary('P2win')->default(FALSE);
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
        //
    }
}
