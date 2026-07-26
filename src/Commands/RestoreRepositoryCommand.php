<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Illuminate\Support\Facades\Artisan;
  use Tobya\WorkWithComposer\Facades\Store;

  class RestoreRepositoryCommand extends Command
  {
    protected $signature = 'composer:restore-local';

    protected $description = 'Command description';

    public function handle(): void
    {
      $list = Store::RepositoryList();


      $reponame = $this->choice('Which repository do you want to restore?', $list->toArray());
    //  echo "\n $repoindex\n ====================== \n";
    //  $reponame = $list[$repoindex];
      $repoInfo = Store::Repository($reponame);

      print_r($repoInfo);

      $this->call('composer:AddLocal',['package' => $reponame,'fullpath' => $repoInfo['local']['url'], '--no-interaction']);



    }
  }
