<?php

use App\Models\DataRangeKriteria;
use App\Models\Kecamatan;
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
        Schema::create('nilai_profils', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kecamatan::class);
            $table->foreignIdFor(DataRangeKriteria::class);
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
        Schema::dropIfExists('nilai_profils');
    }
};
