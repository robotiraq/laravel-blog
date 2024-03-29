<?php

namespace App\Providers;

use App\Models\User;
use App\services\MailchimpNewsletter;
use App\services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


        app()->bind(Newsletter::class,function (){
            $client = new ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us12'
            ]);
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Model::unguard();

        Gate::define('admin',function (User $user){
          return  $user->email === 'ibrae59@gmail.com';
        });
    }
}
