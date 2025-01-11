<?php

namespace MoonlyDays\Crowdin;

use Illuminate\Config\Repository;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use InvalidArgumentException;
use MoonlyDays\Crowdin\Services\Projects;
use MoonlyDays\Crowdin\Services\SourceFileService;
use MoonlyDays\Crowdin\Services\Storages;

/**
 * @method Storages storages()
 * @method Projects projects()
 * @method SourceFileService sourceFiles()
 */
class Crowdin
{
    protected string $baseUrl = 'https://api.crowdin.com/api/v2';

    protected string $apiKey;

    protected string $projectId;

    public function __construct(
        protected Repository $config
    ) {
        $this->apiKey = $this->config->get('services.crowdin.key');
        $this->projectId = $this->config->get('services.crowdin.project_id');
    }

    protected function service(string $name, array $arguments): Service
    {
        $name = Str::of($name)->singular()->studly();
        if (class_exists($className = 'MoonlyDays\\Crowdin\\Services\\'.$name.'Service')) {
            return new $className($this, ...$arguments);
        }

        throw new InvalidArgumentException('Invalid Crowdin API service');
    }

    public function projectId(): string
    {
        return $this->projectId;
    }

    public function apiKey(): string
    {
        return $this->apiKey;
    }

    public function request(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)
            ->withHeader('Authorization', "Bearer $this->apiKey");
    }

    public function __call(string $name, array $arguments)
    {
        return $this->service($name, $arguments);
    }
}
