<?php

namespace MoonlyDays\Crowdin\Services;

use Illuminate\Http\Client\ConnectionException;
use MoonlyDays\Crowdin\Resources\Project;
use MoonlyDays\Crowdin\Service;

class ProjectService extends Service
{
    /**
     * @throws ConnectionException
     */
    public function get(int $projectId): Project
    {
        return new Project(
            $this->newRequest()->get("projects/$projectId")
        );
    }
}
