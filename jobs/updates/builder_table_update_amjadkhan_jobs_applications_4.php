<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsApplications4 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->string('city');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->dropColumn('city');
        });
    }
}
