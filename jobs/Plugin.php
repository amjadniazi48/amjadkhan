<?php namespace AmjadKhan\Jobs;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    	'AmjadKhan\Jobs\Components\ListJobs' => 'listjobs'
     ];
    }
     public function pluginDetails()
    {
        return [
            'name' => 'Job Plugin',
            'description' => ' Provides jobs applications managment portal for any website',
            'author' => 'Amjad Khan',
            'icon' => 'icon-suitcase'
        ];
    }

    public function registerSettings()
    {
    }
    public function registerMailTemplates()
	{
	    return [
	        'amjadkhan.jobs::mail.sendmailtoadmin',
	        'amjadkhan.jobs::mail.sendmailtoapplicant'
	    ];
	}
}
