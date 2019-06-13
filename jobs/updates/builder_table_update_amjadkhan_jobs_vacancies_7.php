<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsVacancies7 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->renameColumn('jobtype_id', 'jobtypes_id');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->renameColumn('jobtypes_id', 'jobtype_id');
        });
    }
}
