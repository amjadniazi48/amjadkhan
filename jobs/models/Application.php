<?php namespace AmjadKhan\Jobs\Models;

use Model;
use DB;
/**
 * Model
 */
class Application extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'amjadkhan_jobs_applications';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachOne = [
        'cvfile'=>'System\Models\File'
    ];
   /*  public $hasManyThrough = [
        'departments' => [
            'AmjadKhan\Jobs\Models\Department',
            'through' =>   'AmjadKhan\Jobs\Models\Vacancy',
        ],
    ];*/
  /*  public $hasManyThrough = [
    'departments' => [
        'AmjadKhan\Jobs\Models\Department',
        'key'        => 'vacancy_id',
        'through'    => 'AmjadKhan\Jobs\Models\Vacancy',
        'throughKey' => 'department_id'
        ],
    ];*/

      public function getDepartmentAttribute()
    {
        $department = '';
       

           $record= DB::table('AmjadKhan_jobs_departments')
            ->join('AmjadKhan_jobs_vacancies', 'AmjadKhan_jobs_vacancies.vacancy_id', '=', ' AmjadKhan_jobs_vacancies.id')
            ->join('AmjadKhan_jobs_departments', 'AmjadKhan_jobs_vacancies.department_id', '=', 'AmjadKhan_jobs_departments.id')
            ->select('department_name')
            ->get();
            return $record->department_name;
        
    }
}
