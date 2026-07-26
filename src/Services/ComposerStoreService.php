<?php

  namespace Tobya\WorkWithComposer\Services;

  use Illuminate\Support\Arr;

  class ComposerStoreService
  {

   protected $workwithcomposer_filename = 'work-with-composer.json';

      protected $data = null;

      protected $composer_filename = 'composer.json';

      public function __construct()
      {
        $this->load();
      }

      public function load(){

          if ($this->data === null) {
            $this->data = json_decode(file_get_contents($this->full_filename()), true,  );
          }

          return $this;
      }

      public function full_filename(){
          return base_path($this->composer_filename);
      }

      protected function write()
      {
          file_put_contents($this->full_filename(), json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
          return $this;
      }

      public function asArray(){
          return $this->data;
      }

      public function get(string $key) : mixed
      {
          return Arr::get($this->data, $key);
      }

      public function set(string $keyname, $value, $save = true) : mixed
      {
          Arr::set($this->data, $keyname, $value);

          if ($save) {
              $this->write();
          }

          return $this;
      }




  }
