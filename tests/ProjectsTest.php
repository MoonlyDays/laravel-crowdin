<?php

use MoonlyDays\Crowdin\Crowdin;

it('can get a specific project', function () {

    $crowdin = app(Crowdin::class);
    dd($crowdin->projects()->get()->id);

});
