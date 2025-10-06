<?php namespace ATSDK\Api\Rest\Traits;

use ATSDK\InfusionsoftException;

trait CannotCreate {

	public function create(array $params = array()) {
		throw new InfusionsoftException(
			__CLASS__.' cannot use '.__FUNCTION__.' function.'
		);
	}

}