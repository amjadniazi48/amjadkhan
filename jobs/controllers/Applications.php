<?php namespace AmjadKhan\Jobs\Controllers;
use Backend\Classes\Controller;
use BackendMenu;
use Response;
class Applications extends Controller
{
    public $cvfile;
    public $implement = [   'Backend\Behaviors\ListController',
                            'Backend\Behaviors\FormController',     
                            'Backend\Behaviors\ReorderController'  
                        ];
    public $listConfig      = 'config_list.yaml';
    public $formConfig      = 'config_form.yaml';
    public $reorderConfig   = 'config_reorder.yaml';
    public $belongsTo = [
                  'department' => [Department::class, 'table' => 'amjadkhan_jobs_departments']
                ];
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AmjadKhan.Jobs', 'main-menu-item', 'side-menu-item2');
    }
   /* public function OnUpdate()
    {
    	$id=post('rowid');
    	return redirect('backend/AmjadKhan/jobs/applications/update/'.$id);
    }*/
    public function preview($id=null)
    {
        $this->pageTitle="Preview Application Details";
        $this->vars['recordId']=$id;      
    }
    

}
