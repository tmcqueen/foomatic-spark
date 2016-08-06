<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Foomatic',
        'product' => 'Makerspace',
        'street' => '431 S. Goldthwaite St.',
        'location' => 'Montgomery, AL 36104',
        'phone' => '334-220-8649',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'tim.mcqueen@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        //Spark::useBraintree()->noCardUpFront()->trialDays(10);
        Spark::useBraintree()->noCardUpFront();

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Basic', 'maker-monthly')
            ->price(25)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }
}
