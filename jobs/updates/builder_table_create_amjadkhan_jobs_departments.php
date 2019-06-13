<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAmjadKhanJobsDepartments extends Migration
{
    public function up()
    {
        Schema::create('amjadkhan_jobs_departments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('department_name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('amjadkhan_jobs_departments');
    }
}
