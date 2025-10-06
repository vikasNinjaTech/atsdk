<?php namespace ATSDK\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotCreate;
use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotFind;
use ATSDK\Api\Rest\Traits\CannotList;
use ATSDK\Api\Rest\Traits\CannotSave;
use ATSDK\Api\Rest\Traits\CannotSync;
use ATSDK\Api\Rest\Traits\CannotWhere;

class UserInfoService extends RestModel
{
    use CannotList, CannotWhere, CannotSync, CannotSave, CannotFind, CannotDelete, CannotCreate;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/oauth/connect/userinfo';

    public function get()
    {

        $data = $this->client->restfulRequest('get', $this->getIndexUrl());

        return $data;
    }

}