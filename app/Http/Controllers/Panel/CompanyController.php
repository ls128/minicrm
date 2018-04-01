<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Panel\Company;
use App\Http\Requests\Panel\CompanyFormRequest;

class CompanyController extends Controller //Resource Controller - CRUD
{
    private $company;
    private $page = 10;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->paginate($this->page); //Pagination

        return view('panel.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.companies.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $data = $request->all();
        $insert = $this->company->create($data);

        if($insert){
            return redirect()->route('company.index');
        }
        else{
            return redirect()->route('company.create');
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
        $company = $this->company->find($id);

        return view('panel.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company->find($id);

        return view('panel.companies.create-edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        $data = $request->all();
        $company = $this->company->find($id);
        $update = $company->update($data);

        if($update)
            return redirect()->route('company.index');
        else
            return redirect()->route('company.edit', $id)->with(['errors'=>'Edit error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->company->find($id);
        $delete = $company->delete();

        if($delete)
            return redirect()->route('company.index');
        else
            return redirect()->route('company.show', $id) -> with(['errors' => 'Delete error']);
    }
}
