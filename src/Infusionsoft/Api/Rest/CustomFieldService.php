<?php namespace Infusionsoft\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotCreate;
use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotModel;
use ATSDK\Api\Rest\Traits\CannotSave;
use ATSDK\Api\Rest\Traits\CannotSync;

class CustomFieldService extends RestModel {

    use CannotDelete, CannotSync, CannotSave, CannotCreate, CannotModel;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/contactCustomFields';

}