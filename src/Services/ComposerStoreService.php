<?php

  namespace Tobya\WorkWithComposer\Services;

  use Illuminate\Support\Arr;
  use Illuminate\Support\Collection;

  class ComposerStoreService extends JSONFileReader
  {

        protected $json_filename = 'composer.json';


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

      /*
       "tobya/work-with-composer": {
            "type": "path",
            "url": "C:/Development/github/packages/Composer/work-with-composer",
            "options": {
                "symlink": true
            }
        },
        */
  }
