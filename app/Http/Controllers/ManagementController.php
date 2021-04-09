<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
  // home
  public function home(){
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"], ['name'=>"Management"]
    ];

    return view('/content/management', ['breadcrumbs' => $breadcrumbs]);
  }

}
