<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpsLogBySiteViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createOpsLogBySiteView());
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

    private function createOpsLogBySiteView(): string
    {
        return <<< SQL
            create VIEW ops_log_by_site_view AS
            select operation_logs.id, lognote, user_id, operation_logs.created_at, site_id  from operation_logs
            inner join users on operation_logs.user_id = users.id;
            SQL;
    }

    private function dropView(): string
    {
        return <<< SQL

            DROP VIEW IF EXISTS `ops_log_by_site_view`;
            SQL;
    }
}
