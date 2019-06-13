<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAmjadKhanJobsTypes extends Migration
{
    public function up()
    {
        Schema::create('amjadkhan_jobs_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('job_type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('amjadkhan_jobs_types');
    }
}
