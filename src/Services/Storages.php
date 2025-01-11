<?php

namespace MoonlyDays\Crowdin\Services;

use MoonlyDays\Crowdin\Service;

class Storages extends Service
{
    public function list(?int $limit, ?int $offset)
    {
        return $this->request()
            ->withQueryParameters(compact('limit', 'offset'))
            ->get('storages');
    }

    public function add() {}

    public function get() {}

    public function delete() {}
}
