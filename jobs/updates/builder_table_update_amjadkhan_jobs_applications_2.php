<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsApplications2 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->date('startdate');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->dropColumn('startdate');
        });
    }
}
