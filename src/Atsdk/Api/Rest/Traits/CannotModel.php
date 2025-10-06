<?php namespace ATSDK\Api\Rest\Traits;

use ATSDK\InfusionsoftException;

trait CannotModel {

	public function model() {
		throw new InfusionsoftException(
			__CLASS__.' cannot use '.__FUNCTION__.' function.'
		);
	}

}