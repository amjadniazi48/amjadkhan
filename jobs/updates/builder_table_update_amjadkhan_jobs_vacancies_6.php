<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsVacancies6 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->integer('jobtype_id');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->dropColumn('jobtype_id');
        });
    }
}
