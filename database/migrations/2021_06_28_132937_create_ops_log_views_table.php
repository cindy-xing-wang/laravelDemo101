<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpsLogViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createOpsLogView());
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

    private function createOpsLogView(): string
    {
        return <<< SQL
            create VIEW ops_log_view AS
            select operation_logs.id, lognote, u.name, operation_logs.created_at, s.name Site  from operation_logs
            inner join users u on operation_logs.user_id = u.id
            inner join sites s on u.site_id = s.id;
            SQL;
    }

    private function dropView(): string
    {
        return <<< SQL

            DROP VIEW IF EXISTS `ops_log_view`;
            SQL;
    }
}
