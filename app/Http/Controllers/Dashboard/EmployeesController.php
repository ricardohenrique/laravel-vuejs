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
        $employees = Employees::with('salary', 'title', 'departments')->get();
        // dd($employees->toArray());
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
        if(count($data['departments']) <= 0){
            $messageReturn = "Cadastre pelo menos um departamento antes de cadastrar funcionarios";
            return redirect('dashboard/departments')->with('status', $messageReturn);
        }
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

        foreach ($request->department as $key => $value) {
            $departmentsEmployees = new DepartmentsEmployees;
            $departmentsEmployees->emp_id = $employe->id;
            $departmentsEmployees->dept_id = $value;
            $departmentsEmployees->save();
        }

        $messageReturn = "Funcionario '".$employe->first_name."' salvo com sucesso";
        return redirect('dashboard/employees')->with('status', $messageReturn);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['employe'] = Employees::with('salary', 'title', 'departments')->where('id', $id)->first();
        // dd($data['employe']->toArray());
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

        $title = Titles::where('emp_id', $employe->id)->first();
        $title->title = $request->title;
        $title->emp_id = $employe->id;
        $title->save();

        $salarie = Salaries::where('emp_id', $employe->id)->first();
        $salarie->salary = $request->salary;
        $salarie->emp_id = $employe->id;
        $salarie->save();

        $departmentsEmployeesDelete = DepartmentsEmployees::where('emp_id', $employe->id)->forcedelete();

        foreach ($request->department as $key => $value) {
            $departmentsEmployees = new DepartmentsEmployees;
            $departmentsEmployees->emp_id = $employe->id;
            $departmentsEmployees->dept_id = $value;
            $departmentsEmployees->save();
        }

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
