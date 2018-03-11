<?php

namespace Tumichnix\HaveIBeenPwned\Services\Breaches;

use Tumichnix\HaveIBeenPwned\Contracts\Api;

class Account extends Api
{
    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function show($domain = null, $truncate = false, $unverified = false)
    {
        $params = [
            'truncateResponse' => var_export($truncate, true),
            'includeUnverified' => var_export($unverified, true),
        ];

        if (!is_null($domain)) {
            $params['domain'] = $domain;
        }

        $endpoint = 'breachedaccount/'.$this->account.'?'.http_build_query($params);
        return $this->get($endpoint);
    }
}
