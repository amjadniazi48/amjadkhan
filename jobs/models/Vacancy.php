<?php namespace AmjadKhan\Jobs\Models;

use Model;

/**
 * Model
 */
class Vacancy extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'amjadkhan_jobs_vacancies';
    protected $jsonable=['requirments','expectations','emailto'];
    protected $fillable = [
        'status'
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsTo = [
                'department' => [Department::class, 'table' => 'amjadKhan_jobs_departments'],
                'jobtypes'=>[Jobtype::class,'table'=>'amjadKhan_jobs_types']
    ];


}
