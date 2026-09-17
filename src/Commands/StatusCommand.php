<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Tobya\WorkWithComposer\Facades\WorkStore;

  class StatusCommand extends Command
  {
    protected $signature = 'composer:status';

    protected $description = 'List All local and production repositories Available';

    public function handle(): void
    {
      $list = WorkStore::RepositoryList();

      foreach ($list as $repo) {
        $this->info($repo);
      }

      $this->comment('End of Repositories Available');

    }
  }
