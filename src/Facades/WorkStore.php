<?php

  namespace Tobya\WorkWithComposer\Facades;

  use Illuminate\Support\Facades\Facade;
  use Tobya\WorkWithComposer\Services\WorkStoreService;

  class WorkStore extends Facade
  {
    protected static function getFacadeAccessor(): string
    {
      return WorkStoreService::class;
    }
  }
