<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link'=>"home",'name'=>"Home"], ['name'=>"Branches"]
        ];

        $branches = Branch::latest()->paginate(5);
    
        return view('content.branches.index',compact('branches'), ['breadcrumbs' => $breadcrumbs])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"branches",'name'=>"Branches"], ['name'=>"Create"]
        ];
        
        return view('content.branches.create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
    
        Branch::create($request->all());
     
        return redirect()->route('branches')
                        ->with('success','Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $breadcrumbs = [
            ['link'=>"branches",'name'=>"Branches"], ['name'=>"View"]
        ];

        return view('content.branches.show',compact('branch'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $breadcrumbs = [
            ['link'=>"branches",'name'=>"Branches"], ['name'=>"Update"]
        ];

        return view('content.branches.edit',compact('branch'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
    
        $branch->update($request->all());
    
        return redirect()->route('branches')
                        ->with('success','Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
    
        return redirect()->route('branches.index')
                        ->with('success','Branch deleted successfully');
    }
}
