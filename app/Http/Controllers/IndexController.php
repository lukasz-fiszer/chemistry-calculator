<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ChemCalc\Domain\Chemistry\EntryPoint;

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

    /**
     * Show about page
     * 
     * @param  Request $request request
     * @return View view
     */
    public function about(Request $request){
    	return view('about');
    }

    /**
     * Show contact page
     * 
     * @param  Request $request request
     * @return View view
     */
    public function contact(Request $request){
    	return view('contact');
    }
}
