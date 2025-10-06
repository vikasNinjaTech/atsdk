<?php namespace ATSDK\Api\Rest;

use ATSDK\Api\Rest\Traits\CannotDelete;
use ATSDK\Api\Rest\Traits\CannotSync;

class SubscriptionService extends RestModel
{
    use CannotSync, CannotDelete;

    public $full_url = 'https://api.infusionsoft.com/crm/rest/v1/subscriptions';

    public $return_key = 'subscriptions';
}
