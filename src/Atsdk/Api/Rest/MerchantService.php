<?php

namespace ATSDK\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotCreate;
use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotFind;
use ATSDK\Api\Rest\Traits\CannotModel;
use ATSDK\Api\Rest\Traits\CannotSave;
use ATSDK\Api\Rest\Traits\CannotSync;
use ATSDK\Api\Rest\Traits\CannotWhere;

class MerchantService extends RestModel
{
    use CannotCreate, CannotDelete, CannotFind, CannotModel, CannotSave, CannotSync, CannotWhere;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/merchants';
    public $return_key = 'merchant_accounts';
}