<?php

return [
    'siteKey' => env('INVISIBLE_RECAPTCHA_SITEKEY'),
    'secretKey' => env('INVISIBLE_RECAPTCHA_SECRETKEY'),
    'hideBadge' => env('INVISIBLE_RECAPTCHA_BADGEHIDE', false),
    'debug' => env('INVISIBLE_RECAPTCHA_DEBUG', false)
];
