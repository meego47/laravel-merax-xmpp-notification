<?php

namespace LaravelMerax\XmppNotification;

use Fabiang\Xmpp\Options;
use Illuminate\Support\ServiceProvider;
use Fabiang\Xmpp\Client as JabberService;

class JabberServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->when(JabberChannel::class)
              ->needs(Jabber::class)
              ->give(function () {
                  return new Jabber(
                      $this->app->make(JabberService::class)
                  );
              });
        $this->app->bind(JabberService::class, function () {
            $username = config('services.jabber.username');
            $password = config('services.jabber.password');
            $address = config('services.jabber.address');

            $logger = $this->app['log'];
            $options = new Options($address);
            $options->setLogger($logger)
                  ->setUsername($username)
                  ->setPassword($password);

            return  new JabberService($options);
        });
    }
}
