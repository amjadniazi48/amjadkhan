<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsVacancies5 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->string('location', 150);
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->dropColumn('location');
        });
    }
}
