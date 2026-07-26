<?php

  namespace Tobya\WorkWithComposer\Facades;

  use Illuminate\Support\Facades\Facade;
  use Tobya\WorkWithComposer\Services\ComposerStoreService;

  class Composer extends Facade
  {
    protected static function getFacadeAccessor(): string
    {
      return ComposerStoreService::class;
    }
  }
