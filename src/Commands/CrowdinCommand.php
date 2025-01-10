<?php

namespace MoonlyDays\Crowdin\Commands;

use Illuminate\Console\Command;

class CrowdinCommand extends Command
{
    public $signature = 'laravel-crowdin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
