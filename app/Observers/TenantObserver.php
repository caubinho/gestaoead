<?php

namespace App\Observers;

use App\Models\Tenant;
use Webpatser\Uuid\Uuid;


class TenantObserver
{
    /**
     * Handle the Tenant "creating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->id = Uuid::generate(4);
    }

}
