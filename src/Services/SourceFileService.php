<?php

namespace MoonlyDays\Crowdin\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use MoonlyDays\Crowdin\Crowdin;
use MoonlyDays\Crowdin\Enums\ProjectFileType;
use MoonlyDays\Crowdin\Resources\Pagination;
use MoonlyDays\Crowdin\Resources\SourceFile;
use MoonlyDays\Crowdin\Service;

class SourceFileService extends Service
{
    public function __construct(
        Crowdin $crowdin,
        protected int $projectId
    ) {
        parent::__construct($crowdin);
    }

    /**
     * @see https://support.crowdin.com/developer/api/v2/#tag/Source-Files/operation/api.projects.files.getMany
     *
     * @return Pagination<SourceFile>
     *
     * @throws ConnectionException
     */
    public function list(
        ?int $limit = null,
        ?int $offset = null,
        ?string $orderBy = null,
        ?int $branchId = null,
        ?int $directoryId = null,
        ?string $filter = null,
        mixed $recursion = null
    ): Pagination {
        return Pagination::make(
            $this->newRequest()
                ->withQueryParameters(compact(
                    'limit',
                    'offset',
                    'orderBy',
                    'branchId',
                    'directoryId',
                    'filter',
                    'recursion'
                ))->get('projects/{projectId}/files')
        )->itemsAs(SourceFile::class);
    }

    /**
     * @throws ConnectionException
     *
     * @see https://support.crowdin.com/developer/api/v2/#tag/Source-Files/operation/api.projects.files.post
     */
    public function add(
        int $storageId,
        string $name,
        ?int $branchId = null,
        ?int $directoryId = null,
        ?string $title = null,
        ?string $context = null,
        ?ProjectFileType $type = null,
        ?int $parserVersion = null,
        ?array $importOptions = null,
        ?array $exportOptions = null,
        ?array $excludedTargetLanguages = null,
        ?array $attachLabelIds = null
    ): SourceFile {
        return SourceFile::make(
            $this->newRequest()
                ->withQueryParameters(func_get_args())
                ->post('projects/{projectId}/files')
        );
    }

    protected function newRequest(): PendingRequest
    {
        return parent::newRequest()->withUrlParameters([
            'projectId' => $this->projectId,
        ]);
    }
}
