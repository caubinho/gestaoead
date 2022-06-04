<?php

namespace App\Tenant;

use App\Models\Tenant\Tenant;

class ManagerTenant
{
    public function subdomain()
    {
        $piecesHost = explode('.', request()->getHost());

        return $piecesHost[0];
    }

    public function tenant()
    {
        $subdomain = $this->subdomain();

        $tenant = Tenant::where('subdomain', $subdomain)->first();

        return $tenant;
    }

    public function identify()
    {
        $tenant = $this->tenant();

        return $tenant->id;
    }

    public function isSubdomainMain()
    {
        $subdomain = $this->subdomain();
        $subdomainMain = config('tenant.subdomain_main');

        return $subdomain == $subdomainMain;
    }
}
