<?php

namespace App\Observers;

use App\Models\User;
use Webpatser\Uuid\Uuid;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->id = Uuid::generate(4);
    }


}
