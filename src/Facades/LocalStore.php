<?php

  namespace Tobya\WorkWithComposer\Facades;

  use Illuminate\Support\Facades\Facade;
  use Tobya\WorkWithComposer\Services\WorkStoreService;

  class LocalStore extends Facade
  {
    protected static function getFacadeAccessor(): string
    {
      return WorkStoreService::class;
    }
  }
