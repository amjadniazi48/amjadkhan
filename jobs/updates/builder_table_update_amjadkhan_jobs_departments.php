<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsDepartments extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_departments', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('department_name')->change();
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_departments', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('department_name', 191)->change();
        });
    }
}
