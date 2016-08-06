<?php

namespace App\Listeners\Subscription;

use Mail;
use Laravel\Spark\Events\Auth\UserRegistered;

class SendNewRegistrationNotificationEmail
{
    /**
     * Create a new listener instance.
     *
     * @param  NotificationRepository  $notifications
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        Mail::send('emails.welcome', ['user' => $user], function($m) use ($user) {
            $m->from('tim.mcqueen@foomatic.org', 'Foomatic Makerspace');
            $m->to($user->email, $user->name)->subject('Welcome, and thanks for registering!');
        });
        
        $user = $event->user;
        Mail::send('emails.new-registration', ['user' => $user], function($m) use ($user) {
            $m->from('tim.mcqueen@foomatic.org', 'Foomatic Makerspace Registration');
            $m->to('tim.mcqueen@foomatic.org')->subject($user->name . ' just registered');
        });
    }
}
