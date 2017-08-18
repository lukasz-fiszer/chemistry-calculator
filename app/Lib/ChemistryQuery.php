<?php

namespace App\Lib;

use ChemCalc\Domain\Chemistry\EntryPoint;

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
	}

    /**
     * @return EntryPoint
     */
    public function getEntryPoint()
    {
        return $this->entryPoint;
    }
}