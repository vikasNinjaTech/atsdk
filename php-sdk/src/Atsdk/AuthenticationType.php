<?php

namespace ATSDK;

enum AuthenticationType {
    case OAuth2AccessToken;
    case LegacyKey;
    case ServiceAccountKey;
    case LaravelBackend;
}
