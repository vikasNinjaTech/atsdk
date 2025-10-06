<?php

namespace atsdk;

class Config
{
    /*
     * Below, all routes come from the new Laravel API - Backend
     *
     * TO-DO Notes: All URL will be updated once the new Laravel API structure is ready
     * */
    const API_VERSION = 'v1';

    const API_BASE_URL = 'https://api.infusionsoft.com/';

    const API_XMLRPC_URL = 'https://api.infusionsoft.com/crm/xmlrpc/v1';

    const API_AUTH_URL = 'https://signin.infusionsoft.com/app/oauth/authorize';

    const API_CRM = 'https://api.infusionsoft.com/crm';

    const API_TOKEN_URL = 'https://api.infusionsoft.com/token';

    const USE_LARAVEL_BACKEND = true;
}