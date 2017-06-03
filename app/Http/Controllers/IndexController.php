<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
	 * Show index page
	 * 
	 * @param  Request $request request
	 * @return View view
	 */
    public function index(Request $request){
    	return view('index');
    }
}
