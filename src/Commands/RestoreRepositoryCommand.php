<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Illuminate\Support\Facades\Artisan;
  use Tobya\WorkWithComposer\Facades\Store;

  class RestoreRepositoryCommand extends Command
  {
    protected $signature = 'composer:restore-local';

    protected $description = 'Creates a linked repository entry in composer.json from info in work-with-composer.json';

    public function handle(): void
    {
      $list = Store::RepositoryList();


      $reponame = $this->choice('Which repository do you want to restore?', $list->toArray());

      $repoInfo = Store::Repository($reponame);



      $this->call('composer:AddLocal',['package' => $reponame,'fullpath' => $repoInfo['local']['url'], '--no-interaction']);



    }
  }
