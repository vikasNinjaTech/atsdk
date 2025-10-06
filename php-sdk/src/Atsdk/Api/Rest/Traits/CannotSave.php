<?php namespace ATSDK\Api\Rest\Traits;

use ATSDK\InfusionsoftException;

trait CannotSave {

	public function save() {
		throw new InfusionsoftException(
			__CLASS__.' cannot use '.__FUNCTION__.' function.'
		);
	}

}