<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistLogViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createChecklistLogView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }

    private function createChecklistLogView(): string
    {
        return <<< SQL
            create VIEW checklist_log_view AS
            select operation_log_id, c.name  from checklist_logs
            inner join checklists c on checklist_logs.checklist_id = c.id;
            SQL;
    }

    private function dropView(): string
    {
        return <<< SQL

            DROP VIEW IF EXISTS `checklist_log_view`;
            SQL;
    }
}
