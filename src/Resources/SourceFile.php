<?php

namespace MoonlyDays\Crowdin\Resources;

use MoonlyDays\Crowdin\Resource;

/**
 * @property int $id
 * @property int $projectId
 * @property int|null $branchId
 * @property int|null $directoryId
 * @property string $name
 * @property string $title
 * @property mixed|null $context
 * @property string $type
 * @property string $path
 * @property string $status
 * @property int $revisionId
 * @property string $priority
 * @property mixed|null $importOptions
 * @property array $exportOptions
 * @property mixed|null $excludedTargetLanguages
 * @property int $parserVersion
 * @property string $createdAt
 * @property string $updatedAt
 */
class SourceFile extends Resource {}
