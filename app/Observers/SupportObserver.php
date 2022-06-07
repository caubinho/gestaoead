<?php

namespace App\Observers;

use App\Models\Support;
use Webpatser\Uuid\Uuid;

class SupportObserver
{
    /**
     * Handle the Support "creating" event.
     *
     * @param  \App\Models\Support  $support
     * @return void
     */
    public function creating(Support $support)
    {
        $support->id = Uuid::generate(4);
    }


}
