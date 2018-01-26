<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentsRequest;
use App\Http\Controllers\Controller;
use App\Departments;

class DepartmentsController extends Controller
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
        $departments = Departments::all();
        $data['departments'] = $departments;

        return view('departments/index', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments/create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentsRequest $request)
    {
        $department = new Departments;
        $department->name = $request->name;
        $department->save();

        $messageReturn = "Departamento '".$department->name."' salvo com sucesso";
        return redirect('dashboard/departments')->with('status', $messageReturn);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $department = Departments::find($id);
        $data['department'] = $department;

        return view('departments/edit', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentsRequest $request, $id)
    {
        $department = Departments::find($id);
        $department->name = $request->name;
        $department->save();

        $messageReturn = "Departamento '".$department->name."' alterado com sucesso";
        return redirect('dashboard/departments')->with('status', $messageReturn);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $department = Departments::find($id);
        $department->delete();

        $messageReturn = "Departamento '".$department->name."' deletado com sucesso";
        return redirect('dashboard/departments')->with('status', $messageReturn);;
    }
}
