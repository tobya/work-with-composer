<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Tobya\WorkWithComposer\Facades\Store;

  class ListRepositoriesCommand extends Command
  {
    protected $signature = 'composer:local-list';

    protected $description = 'List All local and Remote repositories Available';

    public function handle(): void
    {
      $list = Store::RepositoryList();

      foreach ($list as $repo) {
        $this->info($repo);
      }

      $this->comment('End of Repositories Available');

    }
  }
