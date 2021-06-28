<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('checklist_id')->nullable()->unsigned();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('SET NULL');
            
            $table->integer('operation_log_id')->nullable()->unsigned();
            $table->foreign('operation_log_id')->references('id')->on('operation_logs')->onDelete('SET NULL');
           
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
        Schema::table('checklist_logs', function (Blueprint $table) {
            $table->dropForeign('checklist_logs_checklist_id_foreign');
            $table->dropForeign('checklist_logs_operation_log_id_foreign');
        });
        Schema::dropIfExists('checklist_logs');
    }
}
