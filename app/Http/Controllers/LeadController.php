<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Product;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    function __construct()
{
    $this->middleware('permission:lead-list|lead-create|lead-edit|lead-delete', ['only' => ['index','show']]);
    $this->middleware('permission:lead-create', ['only' => ['create','store']]);
    $this->middleware('permission:lead-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:lead-delete', ['only' => ['destroy']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link'=>"home",'name'=>"Home"], ['name'=>"Leads"]
        ];

        $discovereds = Lead::where('status', 'Lead Discovered')->get();
        $contacts = Lead::where('status', 'Contact Initiated')->get();
        $needs = Lead::where('status', 'Needs Identified')->get();
        $negotiations = Lead::where('status', 'In Negotiation')->get();
    
        return view('content.leads.index',compact('discovereds', 'contacts', 'needs', 'negotiations'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"leads",'name'=>"Leads"], ['name'=>"Create"]
        ];

        $products = Product::pluck('name', 'id');
        
        return view('content.leads.create', ['breadcrumbs' => $breadcrumbs])
                ->with('products', $products);
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
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
    
        Lead::create($request->all());
     
        return redirect()->route('leads.index')
                        ->with('success','Lead created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $breadcrumbs = [
            ['link'=>"leads",'name'=>"Leads"], ['name'=>"View"]
        ];

        return view('content.leads.show',compact('lead'), ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $breadcrumbs = [
            ['link'=>"leads",'name'=>"Leads"], ['name'=>"Update"]
        ];
        
        $products = Product::pluck('name', 'id');

        return view('content.leads.edit',compact('lead'), ['breadcrumbs' => $breadcrumbs])
                ->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
    
        $lead->update($request->all());
    
        return redirect()->route('leads.index')
                        ->with('success','Lead updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
    
        return redirect()->route('leads.index')
                        ->with('success','Lead deleted successfully');
    }
}
