<?php

namespace App\Observers;

use App\Models\Tenant\Tenant;
use Illuminate\Support\Str;

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
        $tenant->id = Str::uuid();
    }

}
