<?php

namespace App\Lib;

use ChemCalc\Domain\Chemistry\EntryPoint;
use stdClass;

/**
 * Chemistry query that proceeds chemistry input queries and returns response objects for the queries
 */
class ChemistryQuery
{
	/**
	 * Entry point used for chemistry query input
	 * 
	 * @var EntryPoint
	 */
	protected $entryPoint;

	/**
	 * Construct new chemistry query
	 * 
	 * @param string $input query input
	 */
	public function __construct(string $input){
		$this->entryPoint = new EntryPoint($input);
	}

	/**
	 * Proceed with the query
	 * 
	 * @return object response object for the query
	 */
	public function proceed(){
		$result = $this->entryPoint->proceed();
		$response = new stdClass();

		if($result->status == 'molecule'){
			$response = $this->moleculeResponse($result);
		}

		return $response;
	}

	/**
	 * Make response for molecule query
	 * 
	 * @param  stdClass $result query result object
	 * @return stdClass         query response object
	 */
	protected function moleculeResponse(stdClass $result){
		$response = new stdClass();
		$response = $this->copyValues($result, $response);

		$molecule = $result->context->molecule;
		$response->molecule = (object) [
			'formula' => $molecule->getFormula(),
			'charge' => $molecule->getCharge(),
			'atomicMass' => $molecule->getAtomicMass(),
			'isReal' => $molecule->isReal(),
		];

		return $response;
	}

	/**
	 * Copy values from result to response
	 * 
	 * @param  stdClass $result   query result object
	 * @param  stdClass $response query response object
	 * @return stdClass           query response object with copied values
	 */
	protected function copyValues(stdClass $result, stdClass $response){
		$response->status = $result->status;
		$response->code = $result->code;
		return $response;
	}

    /**
     * @return EntryPoint
     */
    public function getEntryPoint()
    {
        return $this->entryPoint;
    }
}