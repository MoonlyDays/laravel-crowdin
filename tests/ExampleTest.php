<?php

use MoonlyDays\Crowdin\Crowdin;

it('can test', function () {
    $crowdin = app(Crowdin::class);
    dd($crowdin->projects()->get());
});
