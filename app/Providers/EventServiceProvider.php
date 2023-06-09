<?php

namespace App\Providers;

use App\Events\UserInvitation\UserInvitationAccepted;
use App\Events\UserInvitation\UserInvitationCreated;
use App\Listeners\AcceptInvite;
use App\Listeners\SendUserInvitationEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        UserInvitationCreated::class => [
            SendUserInvitationEmail::class,
        ],
        UserInvitationAccepted::class => [
            AcceptInvite::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
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
