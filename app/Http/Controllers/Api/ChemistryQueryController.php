<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ChemCalc\Domain\Chemistry\EntryPoint;

/**
 * Controller for chemistry query api calls
 */
class ChemistryQueryController extends Controller
{
	/**
	 * Proceed chemistry query call
	 * 
	 * @param  Request $request request
	 * @return object response object for chemistry query call
	 */
    public function proceedQuery(Request $request){
    	$input = $request->input('query');

    	$this->validate($request, [
    		'query' => 'required|max:512'
    	]);

    	$t1 = microtime(true);
    	$entryPoint = new EntryPoint($input);
    	$result = $entryPoint->proceed();
    	$t2 = microtime(true);
    	$result->took = $t2 - $t1;

    	$status = 200;
    	if($result->status == 'error' || $result->status == 'unknown'){
    		$status = 422;
    	}

    	return response()->json($result, $status);
    }
}
