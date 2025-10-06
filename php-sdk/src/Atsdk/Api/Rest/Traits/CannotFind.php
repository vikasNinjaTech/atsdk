<?php namespace ATSDK\Api\Rest\Traits;

use ATSDK\InfusionsoftException;

trait CannotFind {

	public function find($id) {
		throw new InfusionsoftException(
			__CLASS__.' cannot use '.__FUNCTION__.' function.'
		);
	}

}