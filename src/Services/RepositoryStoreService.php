<?php

  namespace Tobya\WorkWithComposer\Services;

  use Illuminate\Support\Arr;
  use Illuminate\Support\Collection;

  class RepositoryStoreService  extends JSONFileReader
  {


      public function __construct()
      {
            $this->json_filename = 'work-with-composer.json';
            parent::__construct();
      }

      public function load(){

          if ($this->data === null) {
              if (!file_exists($this->full_filename())) {
                  file_put_contents($this->full_filename(), json_encode(['repositories' => []], JSON_PRETTY_PRINT));
              }
                $this->data = json_decode(file_get_contents($this->full_filename()), true);
          }

          return $this;
      }

      public function RepositoryList() : Collection
      {


          $list = [];
          foreach($this->data['repositories'] as $repoName => $repository){
            $list[] = $repoName;
          }
          return collect($list);
      }

      public function Repository(string $repoName) : array
      {


          return Arr::get($this->data,"repositories.$repoName",[]);

      }






  }


