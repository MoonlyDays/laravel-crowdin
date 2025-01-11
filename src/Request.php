<?php

namespace MoonlyDays\Crowdin;

use Illuminate\Http\Client\PendingRequest;

class Request
{
    public function __construct(
        protected PendingRequest $request
    ) {}
}
