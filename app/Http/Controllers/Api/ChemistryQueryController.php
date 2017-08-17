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

    	$entryPoint = new EntryPoint($input);
    	$result = $entryPoint->proceed();

    	$status = 200;
    	if($result->status == 'error' || $result->status == 'unknown'){
    		$status = 422;
    	}
    	$m = new \ChemCalc\Domain\Chemistry\Entity\Molecule([], 'a');
    	foreach($m as $k => $v){
    		$m->$k = utf8_encode($v);
    	}
    	$j = json_encode($m);
    	dd(json_last_error_msg());
    	dd($m);
    	dd(json_encode((object) ['a' => 'b']));
    	dd(json_encode(new \ChemCalc\Domain\Chemistry\Entity\Molecule([], 'a')));
    	dd(json_encode($result->context->sides[0][0]));
    	//return response()->json($result, $status);
    	return response(json_encode($result), $status, ['Content-Type' => 'application/json']);
    }
}
