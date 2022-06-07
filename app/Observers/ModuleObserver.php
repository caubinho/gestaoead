<?php

namespace App\Observers;

use App\Models\Module;
use Webpatser\Uuid\Uuid;

class ModuleObserver
{
    /**
     * Handle the Module "creating" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function creating(Module $module)
    {
        $module->id = Uuid::generate(4);
    }


}
