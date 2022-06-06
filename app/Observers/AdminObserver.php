<?php

namespace App\Observers;

use App\Models\Admin;
use Webpatser\Uuid\Uuid;


class AdminObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function creating(Admin $admin)
    {
        $admin->id = Uuid::generate(4);

    }


}
