<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvSensitivePointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envSensitivePoint', function (Blueprint $table) {
            $table->increments('envSensitivePoint_id')->comment('敏感点id');
            $table->integer('project_id')->comment('所属项目的id');
            $table->float('envSensitivePoint_lat')->comment('敏感点纬度');
            $table->float('envSensitivePoint_long')->comment('敏感点经度');
            $table->string('envSensitivePoint_desc')->comment('敏感点描述');
            $table->integer('envSensitivePoint_population')->comment('敏感点影响人数');
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
        Schema::dropIfExists('envSensitivePoint');
    }
}
