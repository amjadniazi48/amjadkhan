<?php namespace AmjadKhan\Jobs\Models;

use Model;
/**
 * Model
 */
class Jobtype extends Model
{
    use \October\Rain\Database\Traits\Validation;  
    /**
     * @var string The database table used by the model.
     */
    public $table = 'amjadkhan_jobs_types';
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
