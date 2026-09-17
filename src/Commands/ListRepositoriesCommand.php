<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Tobya\WorkWithComposer\Facades\WorkStore;

  class ListRepositoriesCommand extends Command
  {
    protected $signature = 'composer:list-local';

    protected $description = 'List All local repositories Available';

    public function handle(): void
    {
      $list = WorkStore::RepositoryList();

      foreach ($list as $repo) {
        $this->info($repo);
      }

      $this->comment('End of Repositories Available');

    }
  }
