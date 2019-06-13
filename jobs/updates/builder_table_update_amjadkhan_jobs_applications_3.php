<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsApplications3 extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('expected_salary', 150);
            $table->renameColumn('coverletter', 'cover_letter');
            $table->renameColumn('startdate', 'start_date');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('expectedsalary');
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('expected_salary');
            $table->renameColumn('cover_letter', 'coverletter');
            $table->renameColumn('start_date', 'startdate');
            $table->string('firstname', 150);
            $table->string('lastname', 150);
            $table->string('expectedsalary', 150);
        });
    }
}
