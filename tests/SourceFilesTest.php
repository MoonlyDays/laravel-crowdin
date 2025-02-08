<?php

use Illuminate\Support\Facades\Http;
use MoonlyDays\Crowdin\Crowdin;
use MoonlyDays\Crowdin\Resources\Pagination;
use MoonlyDays\Crowdin\Resources\SourceFile;

it('can read source files', function () {
    $source = SourceFile::make([
        'data' => [
            'title' => 'Language Strings',
        ],
    ]);

    expect($source)->toBeInstanceOf(SourceFile::class)
        ->and($source->title)->toBe('Language Strings');
});

it('can list source files', function () {
    Http::fake(Http::response([
        'data' => [[
            'data' => [
                'id' => 1,
            ],
        ]],
        'pagination' => [
            'offset' => 0,
            'limit' => 1,
        ],
    ]));

    $sourceFiles = app(Crowdin::class)->sourceFiles(1);
    $projects = $sourceFiles->list(1);
    $project = $projects->all()->first();

    expect($projects)->toBeInstanceOf(Pagination::class)
        ->and($projects->count())->toBe(1)
        ->and($project)->toBeInstanceOf(SourceFile::class);
});

it('can add a new source file', function () {
    $sourceFile = SourceFile::make([
        'data' => [
            'storageId' => 61,
            'name' => 'umbrella_app.xliff',
            'branchId' => 34,
            'directoryId' => 4,
            'title' => 'source_app_info',
            'context' => 'Additional context valuable for translators',
            'type' => 'xliff',
            'parserVersion' => 1,
        ],
    ]);

    Http::fake(Http::response($sourceFile->toArray()));

    $sourceFiles = app(Crowdin::class)->sourceFiles(1);
    expect($sourceFiles->add($sourceFile))->toMatchArray($sourceFile->toArray());
});
