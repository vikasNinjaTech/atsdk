<?php namespace ATSDK\Api\Rest\Traits;

use ATSDK\InfusionsoftException;

trait CannotDelete {

	public function delete() {
		throw new InfusionsoftException(
			__CLASS__.' cannot use '.__FUNCTION__.' function.'
		);
	}

}