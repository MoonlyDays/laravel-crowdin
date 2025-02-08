<?php

namespace MoonlyDays\Crowdin;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use JsonSerializable;

class Resource implements Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    protected string $wrapData = 'data';

    protected array $data;

    public function __construct(mixed $resource)
    {
        $this->data = data_get($resource, $this->wrapData, []);
    }

    /**
     * Gets the value of a specific key.
     *
     * @return array|mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return data_get($this->data, $key, $default);
    }

    /**
     * Sets the value of a specific key.
     */
    public function set(string $key, mixed $value): void
    {
        data_set($this->data, $key, $value);
    }

    public function has(string $key): bool
    {
        return Arr::has($this->data, $key);
    }

    /**
     * Returns the entire chunk of data of this resource.
     */
    public function data(): array
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [$this->wrapData => $this->data];
    }

    public function offsetExists(mixed $offset): bool
    {
        return $this->has($offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->get($offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->set($offset, $value);
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
        return $this->get($name);
    }

    public function __set(string $name, $value): void
    {
        $this->set($name, $value);
    }

    public static function make(mixed ...$arguments): static
    {
        return new static(...$arguments);
    }
}
