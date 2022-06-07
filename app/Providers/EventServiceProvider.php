<?php

namespace App\Providers;

use App\Events\{
    SupportReplied
};
use App\Listeners\{
    SendMailSupportReplied
};
use App\Models\{
    Admin,
    Lesson,
    Course,
    Module,
    Tenant,
    ReplySupport,
    User,

};

use App\Observers\{
    AdminObserver,
    CourseObserver,
    LessonObserver,
    ModuleObserver,
    ReplySupportObserver,
    TenantObserver,
    UserObserver
};

use Illuminate\Auth\Events\{
    Registered
};
use Illuminate\Auth\Listeners\{
    SendEmailVerificationNotification
};
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SupportReplied::class => [
            SendMailSupportReplied::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Admin::observe(AdminObserver::class);
        Course::observe(CourseObserver::class);
        Lesson::observe(LessonObserver::class);
        ReplySupport::observe(ReplySupportObserver::class);
        Tenant::observe(TenantObserver::class);
        Module::observe(ModuleObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
