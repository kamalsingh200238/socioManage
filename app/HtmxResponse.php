<?php

namespace App;

enum HtmxResponse: string
{
    case RETARGET = 'HX-Retarget';
    case RESWAP = 'HX-Reswap';
    case TRIGGER = 'HX-Trigger';
    case TRIGGER_AFTER_SETTLE = 'HX-Trigger-After-Settle';
    case TRIGGER_AFTER_SWAP = 'HX-Trigger-After-Swap';
    case PUSH_URL = 'HX-Push-Url';
    case REDIRECT = 'HX-Redirect';
    case REFRESH = 'HX-Refresh';
    case REPLACE_URL = 'HX-Replace-Url';
    case RESELECT = 'HX-Reselect';
    case LOCATION = 'HX-Location';

    public function header(string $value): array
    {
        return [$this->value => $value];
    }
}
