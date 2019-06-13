<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsVacancies3 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->text('emailto');
            $table->integer('department_id');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_vacancies', function($table)
        {
            $table->dropColumn('emailto');
            $table->dropColumn('department_id');
        });
    }
}
