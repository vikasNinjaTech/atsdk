<?php namespace Infusionsoft\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotCreate;
use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotModel;
use ATSDK\Api\Rest\Traits\CannotSave;

class TransactionService extends RestModel {

	use CannotCreate, CannotSave, CannotDelete, CannotModel;

	public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/transactions';
	public $return_key = 'transactions';

}