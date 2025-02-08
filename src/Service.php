<?php

namespace MoonlyDays\Crowdin;

use Illuminate\Http\Client\PendingRequest;

class Service
{
    public function __construct(
        protected Crowdin $crowdin
    ) {}

    protected function newRequest(): PendingRequest
    {
        return $this->crowdin->request();
    }
}
