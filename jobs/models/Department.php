<?php namespace AmjadKhan\Jobs\Models;

use Model;

/**
 * Model
 */
class Department extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'amjadkhan_jobs_departments';
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $hasMany = [
        'vacancies' =>  [Vacancy::class, 'table' => 'AmjadKhan_jobs_vacancies']
    ];
    

}
