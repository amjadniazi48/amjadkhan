<?php namespace AmjadKhan\Jobs\Components;
use Cms\Classes\ComponentBase;
use AmjadKhan\Jobs\Models\Vacancy;
use AmjadKhan\Jobs\Models\Application;
use Db;
use Validator;
use ValidationException;
use Input;
use Flash;
use Mail;
class ListJobs extends ComponentBase
{
    public $records;
    public function componentDetails()
    {
        return [
            'name'        => 'ListJobs Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->records=Vacancy::all()->sortByDesc('created_at');
        $this->page['records']=$this->records;
        $today = date('Y-m-d');
        $this->page['today']= $today;
        $careers=Db::table('amjadkhan_jobs_vacancies')->where('status', 0)->where('expired_at', '<=', $today)->get();   
        foreach($careers as $career)
        {
            Db::table('amjadkhan_jobs_vacancies')
            ->where('status', 0)->where('expired_at', '<=', $today)
            ->update(['status' => 1]);
          
        }
    }
    public function onApply()
    {
        $id=post('id');
        $record=Vacancy::find($id);
        return [
              '#jobDetails' => $this->renderPartial('@jobdetails',[
                'record'=>$record
          ])
      ];       
  }
    public function onSubmit(){
        $validator = Validator::make(
            $form = Input::all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required',
                'age'=>'required',
                'city'=>'required',
                'start_date'=>'required',           
                'cover_letter'=>'required',
                'expected_salary'=>'required',
                'cvfile' => 'mimes:pdf,docx', 
            ]
        );
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        $application = new Application;
        $application->first_name=Input::get('first_name');
        $application->last_name=Input::get('last_name');
        $application->email=Input::get('email');
        $application->age=Input::get('age');
        $application->city=Input::get('city');
        $application->vacancy_id=Input::get('vacancy_id');
        $application->experience=Input::get('experience');
        $application->cover_letter=Input::get('cover_letter');
        $application->expected_salary=Input::get('expected_salary');
        $application->current_salary=Input::get('current_salary');
        $application->start_date=Input::get('start_date');
        $application->cvfile=Input::file('cvfile');
        $application->save();
        $data= Vacancy::find($application->vacancy_id);
        //======================EMAIL SENDING CODE==========================//
        $paramsforapplicant = ['name' =>$application->first_name.' '. $application->last_name];
         $paramsforadmin = ['name' =>'Admin'];
        foreach($data->emailto as $mail)
        {         
             Mail::sendTo($mail['emailto'],'amjadkhan.jobs::mail.sendmailtoadmin', $paramsforadmin);  
        }
             Mail::sendTo($application->email,'amjadkhan.jobs::mail.sendmailtoapplicant', $paramsforapplicant);  
         //=========================================================
            Flash::success('Your CV has been submitted successfully!');
    }
}
