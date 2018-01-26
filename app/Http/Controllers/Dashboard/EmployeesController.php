<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
use App\Http\Controllers\Controller;
use App\Employees;
use App\Departments;
use App\DepartmentsEmployees;
use App\Titles;
use App\Salaries;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employees::all();

        return view('employees/index', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Departments::all();
        return view('employees/create', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $employe = new Employees;
        $employe->first_name = $request->first_name;
        $employe->last_name = $request->last_name;
        $employe->gender = $request->gender;
        $employe->hire_date = $request->hire_date;
        $employe->birth_date = $request->birth_date;
        $employe->save();

        $title = new Titles;
        $title->title = $request->title;
        $title->emp_id = $employe->id;
        $title->save();

        $salarie = new Salaries;
        $salarie->salary = $request->salary;
        $salarie->emp_id = $employe->id;
        $salarie->save();

        $departmentsEmployees = new DepartmentsEmployees;
        $departmentsEmployees->emp_id = $employe->id;
        $departmentsEmployees->dept_id = $request->department;
        $departmentsEmployees->save();

        $messageReturn = "Funcionario '".$employe->first_name."' salvo com sucesso";
        return redirect('dashboard/employees')->with('status', $messageReturn);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['employe'] = Employees::find($id);
        $data['departments'] = Departments::all();

        return view('employees/edit', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        $employe = Employees::find($id);
        $employe->first_name = $request->first_name;
        $employe->last_name = $request->last_name;
        $employe->gender = $request->gender;
        $employe->hire_date = $request->hire_date;
        $employe->birth_date = $request->birth_date;
        $employe->save();



        $messageReturn = "Funcionario '".$employe->first_name."' alterado com sucesso";
        return redirect('dashboard/employees')->with('status', $messageReturn);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $employe = Employees::find($id);
        $employe->delete();

        $messageReturn = "Funcionario '".$employe->first_name."' deletado com sucesso";
        return redirect('dashboard/employees')->with('status', $messageReturn);;
    }
}
