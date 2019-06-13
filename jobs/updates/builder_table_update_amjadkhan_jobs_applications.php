<?php namespace AmjadKhan\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAmjadKhanJobsApplications extends Migration
{
    public function up()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->text('experience')->nullable()->change();
            $table->text('coverletter')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('amjadkhan_jobs_applications', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->increments('id')->unsigned()->change();
            $table->text('experience')->nullable(false)->change();
            $table->text('coverletter')->nullable(false)->change();
        });
    }
}
