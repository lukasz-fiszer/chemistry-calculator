<?php

namespace App\Lib;

use ChemCalc\Domain\Chemistry\EntryPoint;
use stdClass;
use ChemCalc\Domain\Chemistry\Entity\Molecule;

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
		else if($result->status == 'reaction_equation'){
			$response = $this->reactionResponse($result);
		}
		else if($result->status == 'error'){
			$response = $this->errorResponse($result);
		}
		else{
			$response = $this->copyValues($result, $response);
		}

		return $response;
	}

	/**
	 * Make reaction equation response
	 * 
	 * @param  stdClass $result query result object
	 * @return stdClass         query response object
	 */
	protected function reactionResponse(stdClass $result){
		$response = new stdClass();
		$response = $this->copyValues($result, $response);

		$response->sides = [];
		$i = 0;
		foreach($result->context->sides as $k => $side){
			$response->sides[$k] = [];
			foreach($side as $key => $moleculeObject){
				$molecule = $this->serializeMolecule($moleculeObject);
				$molecule->coefficient = $result->context->solved[$i++];
				$response->sides[$k][] = $molecule;
			}
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
		$response->molecule = $this->serializeMolecule($molecule);

		return $response;
	}

	/**
	 * Make error response
	 * 
	 * @param  stdClass $result query result object
	 * @return stdClass         query response object
	 */
	protected function errorResponse(stdClass $result){
		$response = new stdClass();
		$response = $this->copyValues($result, $response);

		if($response->code == 100){
			$response->message = 'Empty query input';
		}
		else if($response->code == 201){
			$response->message = 'Unexpected character: \''.$result->context->character.'\' at position: '.$result->context->position;
			$response->context = $this->serializeContext($result->context);
		}
		else if($response->code == 202){
			$response->message = 'Unexpected token: \''.$result->context->token->value.'\' at position: '.$result->context->position;
			$response->context = $this->serializeContext($result->context);
			$response->context->token = $response->context->token->value;
		}
		else if($response->code == 204){
			$response->message = 'Expected other token than: \''.$result->context->actualToken->value.'\' at position: '.$result->context->position;
			$response->context = $this->serializeContext($result->context);
			$response->context->actualToken = $response->context->actualToken->value;
		}

		return $response;
	}

	/**
	 * Serialize molecule for response
	 * 
	 * @param  Molecule $molecule molecule object
	 * @return stdClass           serialized molecule object
	 */
	protected function serializeMolecule(Molecule $molecule){
		return (object) [
			'formula' => $molecule->getFormula(),
			'charge' => $molecule->getCharge(),
			'atomicMass' => number_format($molecule->getAtomicMass(), 2, '.', ''),
			'isReal' => $molecule->isReal(),
		];
	}

	/**
	 * Serialize result context for response
	 * 
	 * @param  stdClass $context result context
	 * @return stdClass          serialized response context object
	 */
	protected function serializeContext(stdClass $context){
		return (object) array_diff_key((array) $context, ['line' => null, 'position' => null]);
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