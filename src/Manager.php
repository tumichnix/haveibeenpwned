<?php

namespace Tumichnix\HaveIBeenPwned;

use Tumichnix\HaveIBeenPwned\Services\Breaches\Account;

class Manager
{
    public function account($account)
    {
        return new Account($account);
    }
}
