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
     * Entry route
     * 
     * @param  Request $request request
     * @return View             view
     */
    public function entry(Request $request){
    	$input = $request->input('query');

    	$t1 = microtime(true);
    	$entryPoint = new EntryPoint($input);
    	$response = $entryPoint->proceed();
    	$t2 = microtime(true);
    	ob_start();
    	echo '<a href="/">home</a><br />';
    	echo 'took '.($t2-$t1).' seconds<br />';
    	ob_end_flush();
    	dd($response);
    }
}
