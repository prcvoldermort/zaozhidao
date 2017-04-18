<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('project_id')->comment('项目id字段');
            $table->string('project_name')->comment('项目名称');
            $table->string('project_title')->nullable()->comment('项目介绍中的标题');
            $table->text('project_foreword')->nullable()->comment('项目介绍引导词');
            $table->text('project_overview')->nullable()->comment('项目概况');
            $table->text('project_airInfluence')->nullable()->comment('大气环境影响');
            $table->text('project_waterInfluence')->nullable()->comment('水环境影响');
            $table->text('project_solidWaste')->nullable()->comment('固体废物影响');
            $table->text('project_environmentRisk')->nullable()->comment('环境风险');
            $table->text('project_others')->nullable()->comment('其他');
            $table->text('project_thoroughView')->nullable()->comment('环评师总体观点');
            $table->float('project_lat')->comment('项目点纬度');
            $table->float('project_long')->comment('项目点经度');
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
        Schema::dropIfExists('project');
    }
}
