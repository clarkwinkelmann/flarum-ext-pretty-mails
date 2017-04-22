<?php

namespace ClarkWinkelmann\PrettyMails;

use Illuminate\Mail\Mailer as LaravelMailer;
use s9e\TextFormatter\Bundles\Fatdown;

class Mailer extends LaravelMailer
{
    public function raw($text, $callback)
    {
        $body = Fatdown::render(Fatdown::parse($text));

        $app = app();
        $settings = $app->make('Flarum\Settings\SettingsRepositoryInterface');

        return $this->send('pretty-mails::mail', [
            'body' => $body,
            'settings' => $settings,
            'baseUrl' => $app->url(),
        ], $callback);
    }
}
