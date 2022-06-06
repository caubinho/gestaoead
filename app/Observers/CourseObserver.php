<?php

namespace App\Observers;

use App\Models\Course;
use Webpatser\Uuid\Uuid;

class CourseObserver
{
    /**
     * Handle the Course "creating" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->id = Uuid::generate(4);
    }


}
