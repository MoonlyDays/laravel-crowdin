<?php

namespace MoonlyDays\Crowdin\Resources;

use Illuminate\Support\Collection;
use MoonlyDays\Crowdin\Resource as CrowdinResource;

/**
 * @template T
 */
class Pagination extends CrowdinResource
{
    protected string $wrapPagination = 'pagination';

    protected array $pagination;

    /**
     * @var class-string<CrowdinResource>|null
     */
    protected ?string $itemsAs;

    public function __construct(mixed $resource)
    {
        parent::__construct($resource);
        $this->pagination = data_get($resource, $this->wrapPagination, []);
    }

    public function offset(): int
    {
        return data_get($this->pagination, 'offset', 0);
    }

    public function limit(): int
    {
        return data_get($this->pagination, 'limit', 0);
    }

    /**
     * @return Collection<int, T>
     */
    public function all()
    {
        return collect($this->data)
            ->when(! is_null($this->itemsAs))
            ->map($this->itemsAs::make(...));
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function toArray(): array
    {
        return [
            $this->wrapPagination => $this->pagination,
            $this->wrapData => $this->data,
        ];
    }

    /**
     * @param  class-string<T>  $resourceClass
     * @return $this
     */
    public function itemsAs(string $resourceClass): self
    {
        $this->itemsAs = $resourceClass;

        return $this;
    }
}
