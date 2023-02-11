<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with("user")->paginate(15);
 
        return view('company.index', compact('companies'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;
        $users = User::where('current_team_id', '2')->pluck('name','id');
        return view('company.create', compact('company','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Company::$rules);

        $company = Company::create($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::with("user")->find($id);
        $users = User::where('current_team_id', '2')->pluck('name','id');
        return view('company.show', compact('company','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::with("user")->find($id);
        $users = User::where('current_team_id', '2')->pluck('name','id');

        return view('company.edit', compact('company','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        request()->validate(Company::$rules);

        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
