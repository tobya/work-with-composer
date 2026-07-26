<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Illuminate\Support\Facades\Artisan;
  use Tobya\WorkWithComposer\Facades\Store;
  use Tobya\WorkWithComposer\Facades\Composer;

  class RestoreProductionRepositoryCommand extends Command
  {
    protected $signature = 'composer:restore-production';

    protected $description = 'Restore a production repository';

    public function handle(): void
    {
      $list = Store::RepositoryList();


      $reponame = $this->choice('Which repository do you want to restore?', $list->toArray());
    //  echo "\n $repoindex\n ====================== \n";
    //  $reponame = $list[$repoindex];
      $repoInfo = Store::Repository($reponame);

      $productionInfo = $repoInfo['production'];

      Composer::set("require.$reponame", $productionInfo['version']);


      $allRepositories = Composer::get('repositories');
      unset($allRepositories[$reponame]);

      Composer::set("repositories", $allRepositories);








    }
  }
