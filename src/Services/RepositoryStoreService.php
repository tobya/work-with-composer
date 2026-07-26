<?php

  namespace Tobya\WorkWithComposer\Services;

  use Illuminate\Support\Arr;
  use Illuminate\Support\Collection;

  class RepositoryStoreService
  {
      protected $workwithcomposer_filename = 'work-with-composer.json';

      protected $data = null;

      public function __construct()
      {

      }

      public function load(){

          if ($this->data === null) {
            $this->data = json_decode(file_get_contents(base_path($this->workwithcomposer_filename)), true);
          }

          return $this;
      }

      public function RepositoryList() : Collection
      {
          $this->load();

          $list = [];
          foreach($this->data['repositories'] as $repoName => $repository){
            $list[] = $repoName;
          }
          return collect($list);
      }

      public function Repository(string $repoName) : array
      {
          $this->load();
          print_r($this->data);
          return Arr::get($this->data,"repositories.$repoName",[]);

      }





  }


