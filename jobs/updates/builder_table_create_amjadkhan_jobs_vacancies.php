<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAmjadKhanJobsVacancies extends Migration
{
    public function up()
    {
        Schema::create('amjadkhan_jobs_vacancies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 150);
            $table->dateTime('expires_at');
            $table->text('description');
            $table->text('requirments')->nullable();
            $table->text('expectations')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('amjadkhan_jobs_vacancies');
    }
}
