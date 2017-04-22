<?php

namespace ClarkWinkelmann\PrettyMails;

use Flarum\Foundation\Application;

return function (Application $app) {
    $app->register(Providers\MailerProvider::class);
};
