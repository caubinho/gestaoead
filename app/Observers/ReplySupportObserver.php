<?php

namespace App\Observers;

use App\Models\ReplySupport;
use Webpatser\Uuid\Uuid;

class ReplySupportObserver
{
    /**
     * Handle the ReplySupport "creating" event.
     *
     * @param  \App\Models\ReplySupport  $admin
     * @return void
     */
    public function creating(ReplySupport $reply)
    {
        $reply->admin_id = auth()->user()->id;
       // $reply->user_id = '039198eb-0656-4898-9e52-5983d3404eb5'; // tmp
        $reply->id = Uuid::generate(4);
    }
}
