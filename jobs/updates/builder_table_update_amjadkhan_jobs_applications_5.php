<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsApplications5 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->integer('current_salary');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->dropColumn('current_salary');
        });
    }
}
