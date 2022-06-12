<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;
use App\Models\Lesson;

class LessonObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Lesson  $user
     * @return void
     */
    public function creating(Lesson $lesson)
    {
        $lesson->id = Uuid::generate(4);
        $lesson->slug = Str::slug($lesson->name);
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\Lesson  $user
     * @return void
     */
    public function updating(Lesson $lesson)
    {
        $lesson->slug = Str::slug($lesson->name);
    }
}
