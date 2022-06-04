<?php

namespace App\Tenant\Scopes;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $tenant = app(ManagerTenant::class)->identify();

        $builder->where('tenant_id', $tenant);
    }
}
