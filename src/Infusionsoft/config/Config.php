<?php

namespace ATSDK\config;

class Config
{
    /*
     * Below, all routes come from the new Laravel API - Backend
     *
     * TO-DO Notes: All URL will be updated once the new Laravel API structure is ready
     * */
    const API_VERSION = 'v1';

    const API_BASE_URL = 'https://eternal-simple-sheepdog.ngrok-free.app/';

    const API_XMLRPC_URL = 'https://eternal-simple-sheepdog.ngrok-free.app/crm/xmlrpc/v1';

    const API_AUTH_URL = 'https://signin.infusionsoft.com/app/oauth/authorize';

    const API_CRM = 'https://eternal-simple-sheepdog.ngrok-free.app/crm';

    const API_TOKEN_URL = 'https://eternal-simple-sheepdog.ngrok-free.app/token';

    const USE_LARAVEL_BACKEND = true;
}