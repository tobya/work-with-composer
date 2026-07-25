<?php

namespace Tobya\WorkWithComposer\Commands;

use Illuminate\Console\Command;

class WorkWithComposerCommand extends Command
{
    public $signature = 'work-with-composer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
