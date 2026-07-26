<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Illuminate\Support\Facades\Process;
  use Tobya\WorkWithComposer\Facades\Store;
  use Tobya\WorkWithComposer\Facades\LocalStore;
  use Symfony\Component\Console\Input\InputInterface;
  use Symfony\Component\Console\Output\OutputInterface;
  use Illuminate\Contracts\Console\PromptsForMissingInput;

  class AddLocalRepoCommand extends Command implements PromptsForMissingInput
  {
    protected $signature = 'composer:AddLocal {package} {fullpath}';

    protected $description = 'Add Local Repository on Local Path via link';

    protected $packageName;
    protected $fullpath;


    public function handle(): int
    {

       // $packageName = $this->ask('Package Name eg. tobya/QueueStatus');
       // $dirPath = $this->ask('Full Directory Path');

        $this->packageName = $this->argument('package');
        $this->dirPath = $this->argument('fullpath');



        /**
         * @var \stdClass composer
         */
        $composer = $this->loadComposer();



        if (!isset($composer->repositories)){
            $composer->repositories = (object) [];
        }

        $repoInfo = (object) [

            'type' => 'path',
            'url' => Str($this->dirPath)->replace('\\','/'),
            "options" => (object)  [
                "symlink" => true
                ]

        ];

        $composer->repositories->{$this->packageName} = $repoInfo;

        $this->writeComposer($composer);
        $this->addtoWorkWithComposer($repoInfo);



        $this->comment('All done - Local Repo for ' . $this->packageName . ' has been created.');
        $this->info('Don\'t forget to composer require your package');
        $this->info('Composer require ' . $this->packageName);

        if ($this->confirm('Do you wish to run it now?' ,false) ){

           $output = Process::run('composer require ' . $this->packageName , function ($in, $output) {

           $this->output->write($output);
           });
        }
        return self::SUCCESS;
    }

      protected function promptForMissingArgumentsUsing() : array
    {
        return [
           'package' => 'Package Name eg. tobya/QueueStatus',
           'fullpath' => 'Full Local Directory Path',
        ];
    }



      public function loadComposer(){
        return json_decode(file_get_contents(base_path('composer.json')), false);
    }

    private function writeComposer(mixed $composer)
    {
          $fileContent = json_encode($composer, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES);
          file_put_contents( base_path('composer.json'), $fileContent);

    }

      private function addtoWorkWithComposer(object $repoInfo)
      {
            echo "\n anda echo apaglkj $this->packageName";
            LocalStore::set("repositories.{$this->packageName}" . ".local"  ,$repoInfo);

            LocalStore::write();

      }


  }
