<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Controllers\Controller;
use App\Employees;

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
        $employees = Employees::all();
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

        return view('employees/create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        $employe = new Employees;
        $employe->first_name = $request->first_name;
        $employe->last_name = $request->last_name;
        $employe->gender = $request->gender;
        $employe->hire_date = $request->hire_date;
        $employe->birth_date = $request->birth_date;
        $employe->save();

        $messageReturn = "Funcionario '".$employe->first_name."' salvo com sucesso";
        return redirect('dashboard/employees')->with('status', $messageReturn);;
    }
}
