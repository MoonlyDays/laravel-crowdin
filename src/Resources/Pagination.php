<?php

namespace MoonlyDays\Crowdin\Resources;

use MoonlyDays\Crowdin\Resource;

class Pagination extends Resource
{
    protected array $meta;

    public function __construct(mixed $resource)
    {
        parent::__construct($resource);
        $this->meta = data_get($resource, 'pagination', []);
    }

    public function offset(): int
    {
        return data_get($this->meta, 'offset', 0);
    }

    public function limit(): int
    {
        return data_get($this->meta, 'limit', 0);
    }
}
