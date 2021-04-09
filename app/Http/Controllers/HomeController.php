<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Lead;
use App\Product;

class HomeController extends Controller
{
  // home
  public function home(){
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"], ['name'=>"Dashboard"]
    ];

    $branches = Branch::count();
    $leads = Lead::count();
    $products = Product::count();

    $discovered = Lead::where('status', 'Lead Discovered')->count();
    $contact = Lead::where('status', 'Contact Initiated')->count();
    $needs= Lead::where('status', 'Needs Identified')->count();
    $negotiation = Lead::where('status', 'In Negotiation')->count();
    $sale = Lead::where('status', 'Actual Sale')->count();


    return view('/content/home', ['breadcrumbs' => $breadcrumbs])
            ->with('branches', $branches)
            ->with('leads', $leads)
            ->with('products', $products)
            ->with('discovered', $discovered)
            ->with('contact', $contact)
            ->with('needs', $needs)
            ->with('negotiation', $negotiation)
            ->with('sale', $sale);
  }

}
