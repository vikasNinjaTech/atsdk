<?php namespace Infusionsoft\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotModel;
use ATSDK\Api\Rest\Traits\CannotSync;

class EmailService extends RestModel
{
    use CannotSync, CannotDelete, CannotModel;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/emails';

    public $return_key = 'emails';
    
    public function send($attributes = [])
    {
        $response = $this->client->restfulRequest('post', $this->getFullUrl('/queue'), $attributes);
        return $response;
    }
}
