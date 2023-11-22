<?php

use App\Models\Admin\DataKriteria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_range_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DataKriteria::class);
            $table->string('nama_sub_kriteria');
            $table->integer('nilai');
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
        Schema::dropIfExists('data_range_kriterias');
    }
};
