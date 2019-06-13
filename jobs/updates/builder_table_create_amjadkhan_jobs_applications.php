<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAmjadKhanJobsApplications extends Migration
{
    public function up()
    {
        Schema::create('amjadkhan_jobs_applications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname', 150);
            $table->string('lastname', 150);
            $table->string('email', 255);
            $table->integer('age');
            $table->integer('vacancy_id');
            $table->string('expectedsalary', 150);
            $table->text('experience');
            $table->text('coverletter');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('amjadkhan_jobs_applications');
    }
}
