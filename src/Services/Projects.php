<?php

namespace MoonlyDays\Crowdin\Services;

use Illuminate\Http\Client\ConnectionException;
use MoonlyDays\Crowdin\Resources\Project;
use MoonlyDays\Crowdin\Service;

class Projects extends Service
{
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
