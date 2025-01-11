<?php

namespace MoonlyDays\Crowdin;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use JsonSerializable;

class Resource implements Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    protected string $wrap = 'data';

    protected array $data;

    public function __construct(mixed $resource)
    {
        $this->data = data_get($resource, $this->wrap, []);
    }

    public function toArray(): array
    {
        return [$this->wrap => $this->data];
    }

    public function offsetExists(mixed $offset): bool
    {
        return Arr::has($this->data, $offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return data_get($this->data, $offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        data_set($this->data, $offset, $value);
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public function toJson($options = 0): false|string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function __get(string $name)
    {
        return data_get($this->data, $name);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->offsetExists($name) ? data_get($this->data, $name) : null;
    }

    public static function make(mixed ...$arguments): static
    {
        return new static(...$arguments);
    }
}
