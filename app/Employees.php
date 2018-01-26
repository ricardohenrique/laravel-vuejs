<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
	use SoftDeletes;
   	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * Get the phone record associated with the user.
     */
    public function salary()
    {
        return $this->hasOne('App\Salaries', 'emp_id', 'id');
    }


    /**
     * Get the phone record associated with the user.
     */
    public function title()
    {
        return $this->hasOne('App\Titles', 'emp_id', 'id');
    }


    /**
     * Get the phone record associated with the user.
     */
    public function departments()
    {
        return $this->belongsToMany('App\Departments', 'dept_emp', 'emp_id', 'dept_id');
    }
}
