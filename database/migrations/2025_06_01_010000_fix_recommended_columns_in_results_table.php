<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixRecommendedColumnsInResultsTable extends Migration
{
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            // Ubah ukuran kolom recommended_major, recommended_university, career_prospects menjadi text untuk menampung data panjang
            $table->text('recommended_major')->change();
            $table->text('recommended_university')->change();
            $table->text('career_prospects')->change();
        });
    }

    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            // Kembalikan ukuran kolom ke string 255 jika rollback
            $table->string('recommended_major', 255)->change();
            $table->string('recommended_university', 255)->change();
            $table->string('career_prospects', 255)->change();
        });
    }
}
