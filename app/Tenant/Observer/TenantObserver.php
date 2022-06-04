<?php

namespace App\Tenant\Observer;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        $tenant = app(ManagerTenant::class)->identify();

        $model->setAttribute('tenant_id', $tenant);
    }
}
