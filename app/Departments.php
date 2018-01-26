<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
	use SoftDeletes;
   	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The roles that belong to the user.
     */
    public function departments_employees()
    {
        return $this->belongsToMany('App\Employees', 'dept_emp', 'emp_id', 'dept_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function departments_manager()
    {
        return $this->belongsToMany('App\Employees', 'dept_manager', 'emp_id', 'dept_id');
    }
}
