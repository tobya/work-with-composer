<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Tobya\WorkWithComposer\Facades\Composer;
  use Tobya\WorkWithComposer\Facades\WorkStore;

  class StatusCommand extends Command
  {
    protected $signature = 'composer:status';

    protected $description = 'List All local and production repositories Available';

    public function handle(): void
    {
      $list = WorkStore::RepositoryList();

      $table = [];
      foreach ($list as $repo) {
          $table[] = [$repo,  'work-with-composer:local'];
      }
      
      $this->table(['Name',  'Type'], $table);

      $localRepoList = Composer::RepositoryList();

      $table = [];
      foreach ($localRepoList as $repo) {
          $table[] = [$repo,  'composer:custom-repo'];
        //$this->info($repo);
      }
      $this->table(['Name',  'Type'], $table);




      $this->comment('End of Repositories Available');

    }
  }
