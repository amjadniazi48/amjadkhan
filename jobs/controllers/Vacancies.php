<?php namespace AmjadKhan\Jobs\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use Redirect;
use Backend;
class Vacancies extends Controller
{
    public $implement = [
            	'Backend\Behaviors\ListController', 
            	'Backend\Behaviors\FormController',   
            	'Backend\Behaviors\ReorderController' 
    	    ];  
            public $listConfig      =   'config_list.yaml';
            public $formConfig      =   'config_form.yaml';
            public $reorderConfig   =   'config_reorder.yaml';
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AmjadKhan.Jobs', 'main-menu-item');
    }
     public function preview($id=null)
    {
        $this->pageTitle="Preview Vacancies Details";
        $this->vars['recordId']=$id;      
    }
    public function OnUpdate()
    {
    	$id=post('rowid');
    	return redirect('backend/AmjadKhan/jobs/vacancies/update/'.$id);
    }
    public function index()
    {
       $this->asExtension('ListController')->index();
       $config  = $this->makeConfig('$/amjadkhan/jobs/models/vacancy/columns.yaml');
       $config->model     = new \AmjadKhan\Jobs\Models\Vacancy;
       $config->recordUrl = 'AmjadKhan/jobs/controllers/Vacancies/update/:id';
       $widget            = $this->makeWidget('Backend\Widgets\Lists',$config);
       $widget->bindToController();
       $this->vars['widget']=$widget;
    }
    public function update($id=null)
    {
        //FROM THIS CODE WE WILL SEE THE UPDATE FORM WITH POPULATED DATA
       $this->asExtension('FormController')->update($id);
       $config = $this->makeConfig('$/amjadkhan/jobs/models/vacancy/columns.yaml');
       $config->model = \AmjadKhan\Jobs\Models\Vacancy::find($id);
       $widget= $this->makeWidget('Backend\Widgets\Form',$config);
       $this->vars['widget']=$widget;
    }
    public function update_onSave($id=null,$context = null)
    {
        //FROM THIS AREA WE WILL SAVE THE FORM AFTER MAKING CHANGES IN IT
       $model= \AmjadKhan\Jobs\Models\Vacancy::find($id);
        $data=post();
        $model->title=$data['Vacancy']['title'];
        $model->expired_at=$data['Vacancy']['expired_at'];
        $model->department_id=$data['Vacancy']['department'];
        $model->requirments= $data['Vacancy']['requirments'];
        $model->expectations= $data['Vacancy']['expectations'];
        $model->jobtypes_id=$data['Vacancy']['jobtypes'];
        $model->location=$data['Vacancy']['location'];
        $model->emailto=$data['Vacancy']['emailto'];
        $today = date('Y-m-d H:i:s');
        $model->save();
          if ($model->expired_at >= $today) {
               $model->update(['status' => 0]);
          }
        Flash::success("Your form has been save successfully");
        return redirect('backend/amjadkhan/jobs/vacancies/index');
    }
    /*public function listInjectRowClass($lesson, $definition)
    {
        // Strike through past lessons
        if ($lesson->expired_at) {
            return 'btn-primary';
        }
    }*/
}
