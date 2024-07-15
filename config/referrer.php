<?php
// config/referrer.php
return [
    'allowed_domains' => explode(',', env('ALLOWED_DOMAINS', 'localhost,127.0.0.1')),
];
