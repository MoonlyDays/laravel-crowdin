<?php

use MoonlyDays\Crowdin\Crowdin;

it('can get a specific source file', function () {

    $crowdin = app(Crowdin::class);
    dd($crowdin->sourceFiles()->list($crowdin->projectId()));

});
