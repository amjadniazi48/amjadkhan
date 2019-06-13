<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsTypes extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_types', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->string('job_type')->change();
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_types', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->increments('id')->unsigned()->change();
            $table->string('job_type', 191)->change();
        });
    }
}
