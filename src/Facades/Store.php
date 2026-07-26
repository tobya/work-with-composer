<?php

  namespace Tobya\WorkWithComposer\Facades;

  use Illuminate\Support\Facades\Facade;
  use Tobya\WorkWithComposer\Services\RepositoryStoreService;

  class Store extends Facade
  {
    protected static function getFacadeAccessor(): string
    {
      return RepositoryStoreService::class;
    }
  }
