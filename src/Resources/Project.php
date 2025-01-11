<?php

namespace MoonlyDays\Crowdin\Resources;

use MoonlyDays\Crowdin\Resource;

/**
 * @property int $id
 * @property int $type
 * @property int $userId
 * @property string $sourceLanguageId
 * @property array $targetLanguageIds
 * @property string $languageAccessPolicy
 * @property string $name
 * @property ?string $cname
 * @property string $identifier
 * @property string $description
 * @property string $visibility
 * @property string $logo
 * @property ?bool $publicDownloads
 * @property ?string $createdAt
 * @property ?string $updatedAt
 * @property ?string $lastActivity
 * @property string $webUrl
 * @property int $savingsReportSettingsTemplateId
 */
class Project extends Resource
{
    protected $casts = [];
}
