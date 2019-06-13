<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsVacancies4 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->boolean('status')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
