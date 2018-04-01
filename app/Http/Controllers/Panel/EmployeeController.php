<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Panel\Employee;
use App\Models\Panel\Company;
use App\Http\Requests\Panel\EmployeeFormRequest;
use DB;

class EmployeeController extends Controller //Resource Controller - CRUD
{
    private $employee;
    private $page = 10;

    public function __construct(Employee $employee)
    {
       $this->employee = $employee; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee->paginate($this->page); //Pagination

        return view('panel.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::table('companies')->pluck('name');

        return view('panel.employees.create-edit', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $data = $request->all();
        $insert = $this->employee->create($data);

        if($insert){
            return redirect()->route('employee.index');
        }
        else{
            return redirect()->route('employee.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employee->find($id);

        return view('panel.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employee->find($id);

        return view('panel.employees.create-edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $data = $request->all();
        $employee = $this->employee->find($id);
        $update = $employee->update($data);

        if($update)
            return redirect()->route('employee.index');
        else
            return redirect()->route('employee.edit', $id)->with(['errors'=>'Edit error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = $this->employee->find($id);
        $delete = $employee->delete();

        if($delete)
            return redirect()->route('employee.index');
        else
            return redirect()->route('employee.show', $id) -> with(['errors' => 'Delete error']);
    }
}
