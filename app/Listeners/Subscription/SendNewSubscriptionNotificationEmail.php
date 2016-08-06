<?php

namespace App\Listeners\Subscription;

use Mail;

class SendNewSubscriptionNotificationEmail
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        Mail::send('emails.new-subscription', ['user' => $user], function($m) use ($user) {
            $m->from('tim.mcqueen@foomatic.org', 'Foomatic Makerspace');
            $m->to($user->email, $user->name)->subject('Thanks for subscribing!');
        });
        
        $user = $event->user;
        Mail::send('emails.new-registration', ['user' => $user], function($m) use ($user) {
            $m->from('tim.mcqueen@foomatic.org', 'Foomatic Makerspace Registration');
            $m->to('tim.mcqueen@foomatic.org')->subject($user->name . ' just choose the plan ' . $user->current_billing_plan);
        });
    }
}
