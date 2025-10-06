<?php namespace ATSDK\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotCreate;
use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotModel;
use ATSDK\Api\Rest\Traits\CannotSave;
use ATSDK\Api\Rest\Traits\CannotSync;
use ATSDK\Infusionsoft;
use ATSDK\InfusionsoftException;

class CampaignService extends RestModel
{

    use CannotCreate, CannotDelete, CannotSave, CannotSync, CannotModel;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/campaigns';

    public $return_key = 'campaigns';

    public function __construct(Infusionsoft $client)
    {
        parent::__construct($client);
    }


}