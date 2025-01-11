<?php

namespace MoonlyDays\Crowdin\Services;

use Illuminate\Http\Client\ConnectionException;
use MoonlyDays\Crowdin\Resources\Project;
use MoonlyDays\Crowdin\Service;

class SourceFileService extends Service
{
    /**
     * @throws ConnectionException
     */
    public function list(int $projectId)
    {
        return $this->request()->get("projects/$projectId/files")->json();
    }

    /**
     * @throws ConnectionException
     */
    public function get(int $projectId): Project
    {
        return new Project(
            $this->request()->get("projects/$projectId")
        );
    }
}
